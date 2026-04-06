<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\CarritoItem;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $carrito = Carrito::query()
            ->with([
                'items.producto.imagenPrincipal',
                'items.producto.marca:id,nombre,imagen',
            ])
            ->where('user_id', $user->id)
            ->where('estado', 'activo')
            ->first();

        return view('web.tienda.carrito', compact('carrito'));
    }

    public function agregar(Request $request, $id)
    {
        $user = Auth::user();

        $producto = Producto::query()
            ->where('estado_publicacion', 'activo')
            ->findOrFail($id);

        $cantidad = max(1, (int) $request->input('cantidad', 1));

        $carrito = Carrito::firstOrCreate(
            [
                'user_id' => $user->id,
                'estado' => 'activo',
            ],
            [
                'subtotal' => 0,
                'descuento' => 0,
                'total' => 0,
            ]
        );

        $precioUnitario = (!is_null($producto->precio_oferta) && (float) $producto->precio_oferta > 0 && (float) $producto->precio_oferta < (float) $producto->precio)
            ? (float) $producto->precio_oferta
            : (float) $producto->precio;

        $item = CarritoItem::where('carrito_id', $carrito->id)
            ->where('producto_id', $producto->id)
            ->first();

        if ($item) {
            $item->cantidad += $cantidad;
            $item->precio_unitario = $precioUnitario;
            $item->subtotal = $item->cantidad * $precioUnitario;
            $item->save();
        } else {
            CarritoItem::create([
                'carrito_id' => $carrito->id,
                'producto_id' => $producto->id,
                'cantidad' => $cantidad,
                'precio_unitario' => $precioUnitario,
                'subtotal' => $cantidad * $precioUnitario,
            ]);
        }

        $this->recalcularCarrito($carrito);

        return redirect()
            ->route('web.tienda.carrito')
            ->with('success', 'Producto agregado al carrito.');
    }

    public function actualizar(Request $request, $id)
{
    $request->validate([
        'cantidad' => ['required', 'integer', 'min:1'],
    ]);

    $user = Auth::user();

    $item = CarritoItem::query()
        ->whereHas('carrito', function ($query) use ($user) {
            $query->where('user_id', $user->id)
                ->where('estado', 'activo');
        })
        ->with('carrito')
        ->findOrFail($id);

    $cantidad = (int) $request->cantidad;
    $item->cantidad = $cantidad;
    $item->subtotal = $cantidad * (float) $item->precio_unitario;
    $item->save();

    $this->recalcularCarrito($item->carrito);
    $item->carrito->refresh();

    if ($request->expectsJson()) {
        return response()->json([
            'ok' => true,
            'item_id' => $item->id,
            'cantidad' => $item->cantidad,
            'item_subtotal' => number_format((float) $item->subtotal, 2, '.', ','),
            'carrito_subtotal' => number_format((float) $item->carrito->subtotal, 2, '.', ','),
            'carrito_descuento' => number_format((float) $item->carrito->descuento, 2, '.', ','),
            'carrito_total' => number_format((float) $item->carrito->total, 2, '.', ','),
        ]);
    }

    return redirect()
        ->route('web.tienda.carrito')
        ->with('success', 'Cantidad actualizada correctamente.');
}

public function eliminar(Request $request, $id)
{
    $user = Auth::user();

    $item = CarritoItem::query()
        ->whereHas('carrito', function ($query) use ($user) {
            $query->where('user_id', $user->id)
                ->where('estado', 'activo');
        })
        ->with('carrito')
        ->findOrFail($id);

    $carrito = $item->carrito;
    $itemId = $item->id;
    $item->delete();

    $this->recalcularCarrito($carrito);
    $carrito->refresh();

    if ($request->expectsJson()) {
        return response()->json([
            'ok' => true,
            'item_id' => $itemId,
            'carrito_subtotal' => number_format((float) $carrito->subtotal, 2, '.', ','),
            'carrito_descuento' => number_format((float) $carrito->descuento, 2, '.', ','),
            'carrito_total' => number_format((float) $carrito->total, 2, '.', ','),
            'carrito_vacio' => $carrito->items()->count() === 0,
        ]);
    }

    return redirect()
        ->route('web.tienda.carrito')
        ->with('success', 'Producto eliminado del carrito.');
}
    private function recalcularCarrito(Carrito $carrito): void
    {
        $carrito->loadMissing('items');

        $subtotal = (float) $carrito->items()->sum('subtotal');
        $descuento = 0;
        $total = $subtotal - $descuento;

        $carrito->update([
            'subtotal' => $subtotal,
            'descuento' => $descuento,
            'total' => $total,
        ]);
    }
}