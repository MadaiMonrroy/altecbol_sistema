<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\ProductoFavorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoFavoritoController extends Controller
{
    public function toggle(Request $request, $productoId)
    {
        $user = Auth::user();

        $producto = Producto::query()
            ->where('estado_publicacion', 'activo')
            ->findOrFail($productoId);

        $favorito = ProductoFavorito::where('user_id', $user->id)
            ->where('producto_id', $producto->id)
            ->first();

        if ($favorito) {
            $favorito->delete();

            return response()->json([
                'ok' => true,
                'favorito' => false,
                'message' => 'Producto eliminado de favoritos.',
            ]);
        }

        ProductoFavorito::create([
            'user_id' => $user->id,
            'producto_id' => $producto->id,
            'created_at' => now(),
        ]);

        return response()->json([
            'ok' => true,
            'favorito' => true,
            'message' => 'Producto agregado a favoritos.',
        ]);
    }
}