<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\Pedido;
use App\Models\PedidoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
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

        if (!$carrito || $carrito->items->isEmpty()) {
            return redirect()
                ->route('web.tienda.carrito')
                ->with('warning', 'Tu carrito está vacío.');
        }

        return view('web.tienda.checkout', compact('carrito', 'user'));
    }

    public function procesar(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nombre_cliente' => ['required', 'string', 'max:150'],
            'telefono_cliente' => ['required', 'string', 'max:30'],
            'email_cliente' => ['nullable', 'email', 'max:150'],
            'direccion_cliente' => ['nullable', 'string'],
            'observaciones' => ['nullable', 'string'],
        ]);

        $carrito = Carrito::query()
            ->with(['items.producto'])
            ->where('user_id', $user->id)
            ->where('estado', 'activo')
            ->first();

        if (!$carrito || $carrito->items->isEmpty()) {
            return redirect()
                ->route('web.tienda.carrito')
                ->with('warning', 'Tu carrito está vacío.');
        }

        $numeroOrden = $this->generarNumeroOrden();
        $trackingToken = Str::uuid()->toString();

        $pedido = Pedido::create([
            'carrito_id' => $carrito->id,
            'user_id' => $user->id,
            'numero_orden' => $numeroOrden,
            'tracking_token' => $trackingToken,
            'nombre_cliente' => $request->nombre_cliente,
            'telefono_cliente' => $request->telefono_cliente,
            'email_cliente' => $request->email_cliente,
            'direccion_cliente' => $request->direccion_cliente,
            'subtotal' => $carrito->subtotal,
            'descuento' => $carrito->descuento,
            'total' => $carrito->total,
            'metodo_pago' => 'qr',
            'estado' => 'pendiente_pago',
            'qr_imagen' => 'images/qr.png', // cambia esto cuando pongas tu QR real
            'qr_texto' => 'Pago por QR',
            'soporte_whatsapp' => config('services.whatsapp.number', '591764347465'),
            'observaciones' => $request->observaciones,
        ]);

        foreach ($carrito->items as $item) {
            PedidoItem::create([
                'pedido_id' => $pedido->id,
                'producto_id' => $item->producto_id,
                'nombre_producto' => $item->producto?->nombre ?? 'Producto',
                'cantidad' => $item->cantidad,
                'precio_unitario' => $item->precio_unitario,
                'subtotal' => $item->subtotal,
            ]);
        }

        $carrito->update([
            'estado' => 'finalizado',
            'observaciones' => $request->observaciones,
        ]);

        return redirect()->route('web.tienda.confirmacion', $pedido->numero_orden);
    }

    public function confirmacion($codigo)
    {
        $user = Auth::user();

        $pedido = Pedido::query()
            ->with(['items'])
            ->where('user_id', $user->id)
            ->where('numero_orden', $codigo)
            ->firstOrFail();

        return view('web.tienda.confirmacion', compact('pedido'));
    }

   public function reportarPago($codigo)
{
    $user = Auth::user();

    $pedido = Pedido::query()
        ->where('user_id', $user->id)
        ->where('numero_orden', $codigo)
        ->firstOrFail();

    if ($pedido->estado === 'pendiente_pago') {
        $pedido->update([
            'estado' => 'pago_reportado',
            'reported_payment_at' => now(),
        ]);
    }

    return redirect()
        ->route('web.tienda.confirmacion', $pedido->numero_orden)
        ->with('success', 'Pago reportado correctamente.');
}

    private function generarNumeroOrden(): string
    {
        do {
            $numero = 'ALT-' . now()->format('Ymd') . '-' . str_pad((string) random_int(1, 9999), 4, '0', STR_PAD_LEFT);
        } while (Pedido::where('numero_orden', $numero)->exists());

        return $numero;
    }
}