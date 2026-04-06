<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index(Request $request)
{
    $productos = Producto::query()
        ->with([
    'categoria:id,nombre',
    'marca:id,nombre,imagen',
    'imagenesPrincipales',
    'imagenPrincipal',
    'favoritos',
])
        ->where('estado_publicacion', 'activo')
        ->orderByDesc('id')
        ->get();

    $categorias = Categoria::query()
        ->where('estado', 'activo')
        ->orderBy('nombre')
        ->get(['id', 'nombre']);

    $marcas = Marca::query()
        ->where('estado', 'activo')
        ->orderBy('nombre')
        ->get(['id', 'nombre', 'imagen']);

    return view('web.tienda.index', compact(
        'productos',
        'categorias',
        'marcas'
    ));
}

    public function show($codigo)
{
    $producto = Producto::query()
        ->with([
    'categoria:id,nombre',
    'marca:id,nombre,imagen',
    'imagenes',
    'imagenPrincipal',
    'imagenesPrincipales',
    'imagenesSecundarias',
    'favoritos',
])
        ->where('estado_publicacion', 'activo')
        ->where('codigo', $codigo)
        ->firstOrFail();

    $galeria = $producto->imagenes->sortBy('orden')->values();

    $palabras = collect(preg_split('/\s+/', trim($producto->nombre)))
        ->filter(fn ($palabra) => mb_strlen($palabra) >= 4)
        ->map(fn ($palabra) => trim($palabra))
        ->unique()
        ->take(6)
        ->values();

    $relacionadosPorNombre = Producto::query()
        ->with(['imagenPrincipal', 'favoritos'])
        ->where('estado_publicacion', 'activo')
        ->where('id', '!=', $producto->id)
        ->where(function ($query) use ($palabras) {
            foreach ($palabras as $palabra) {
                $query->orWhere('nombre', 'like', '%' . $palabra . '%');
            }
        })
        ->latest('id')
        ->take(12)
        ->get();

    $idsYaTomados = $relacionadosPorNombre->pluck('id')->all();

    $faltantes = max(0, 12 - $relacionadosPorNombre->count());

    $relacionadosPorCategoria = collect();

    if ($faltantes > 0 && $producto->categoria_id) {
        $relacionadosPorCategoria = Producto::query()
            ->with('imagenPrincipal')
            ->where('estado_publicacion', 'activo')
            ->where('id', '!=', $producto->id)
            ->where('categoria_id', $producto->categoria_id)
            ->whereNotIn('id', $idsYaTomados)
            ->latest('id')
            ->take($faltantes)
            ->get();
    }

    $relacionados = $relacionadosPorNombre
        ->concat($relacionadosPorCategoria)
        ->take(12)
        ->values();

    return view('web.tienda.show', compact(
        'producto',
        'galeria',
        'relacionados'
    ));
}
}