<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Support\Str;

class CatalogoController extends Controller
{
    public function index()
    {
        $productos = Producto::query()
            ->with([
                'categoria:id,nombre',
                'marca:id,nombre',
                'imagenPrincipal',
            ])
            ->where('estado_publicacion', 'activo')
            ->get()
            ->map(function ($producto) {
                return [
                    'id' => $producto->codigo,
                    'name' => $producto->nombre,
                    'model' => $producto->sku ?? $producto->codigo,
                    'brand' => Str::slug($producto->marca->nombre ?? 'generico'),
                    'brandLabel' => $producto->marca->nombre ?? 'Genérico',
                    'category' => Str::slug($producto->categoria->nombre ?? 'sin-categoria'),
                    'categoryLabel' => $producto->categoria->nombre ?? 'Sin categoría',
                    'image' => $producto->imagenPrincipal && $producto->imagenPrincipal->imagen
                        ? asset('storage/' . $producto->imagenPrincipal->imagen)
                        : asset('websitio/ing/default.webp'),
                    'summary' => $producto->descripcion
                        ? Str::limit(strip_tags($producto->descripcion), 220)
                        : 'Producto disponible para cotización, consulta y venta corporativa.',
                ];
            })
            ->values();

        $categorias = Categoria::query()
            ->where('estado', 'activo')
            ->orderBy('nombre')
            ->get(['id', 'nombre'])
            ->map(function ($categoria) {
                return [
                    'value' => Str::slug($categoria->nombre),
                    'label' => $categoria->nombre,
                ];
            })
            ->values();

        $marcas = Marca::query()
            ->where('estado', 'activo')
            ->orderBy('nombre')
            ->get(['id', 'nombre'])
            ->map(function ($marca) {
                return [
                    'value' => Str::slug($marca->nombre),
                    'label' => $marca->nombre,
                ];
            })
            ->values();

        return view('websitio.catalogo-productos', compact('productos', 'categorias', 'marcas'));
    }
}