<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Laravel\Facades\Image;

class MarcaController extends Controller
{
    public function index(Request $request)
    {
        $estado = $request->query('estado');

        $query = Marca::query();

        if ($estado !== null && $estado !== '') {
            $query->where('estado', $estado);
        }

        $marcas = $query
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.productos.marcas.index', compact(
            'marcas',
            'estado'
        ));
    }

    public function create()
    {
        return view('admin.productos.marcas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:150', 'unique:marcas,nombre'],
            'descripcion' => ['nullable', 'string'],
            'estado' => ['required', Rule::in(['activo', 'inactivo'])],
            'imagen' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $this->guardarImagenMarca($request->file('imagen'), $data['nombre']);
        }

        Marca::create($data);

        return redirect()
            ->route('admin.productos.marcas.index')
            ->with('success', 'Marca registrada correctamente.');
    }

    public function edit($id)
    {
        $marca = Marca::findOrFail($id);

        return view('admin.productos.marcas.edit', compact('marca'));
    }

    public function update(Request $request, $id)
{
    $marca = Marca::findOrFail($id);

    $nombreAnterior = $marca->nombre;
    $imagenAnterior = $marca->imagen;

    $data = $request->validate([
        'nombre' => [
            'required',
            'string',
            'max:150',
            Rule::unique('marcas', 'nombre')->ignore($marca->id),
        ],
        'descripcion' => ['nullable', 'string'],
        'estado' => ['required', Rule::in(['activo', 'inactivo'])],
        'imagen' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
    ]);

    if ($request->hasFile('imagen')) {
        if ($imagenAnterior && Storage::disk('public')->exists($imagenAnterior)) {
            Storage::disk('public')->delete($imagenAnterior);
        }

        $data['imagen'] = $this->guardarImagenMarca($request->file('imagen'), $data['nombre']);
    } elseif (
        $imagenAnterior &&
        $nombreAnterior !== $data['nombre'] &&
        Storage::disk('public')->exists($imagenAnterior)
    ) {
        $data['imagen'] = $this->renombrarImagenMarca($imagenAnterior, $data['nombre']);
    }

    $marca->update($data);

    return redirect()
        ->route('admin.productos.marcas.index')
        ->with('success', 'Marca actualizada correctamente.');
}

    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);

        if ($marca->imagen && Storage::disk('public')->exists($marca->imagen)) {
            Storage::disk('public')->delete($marca->imagen);
        }

        $marca->delete();

        return redirect()
            ->route('admin.productos.marcas.index')
            ->with('success', 'Marca eliminada correctamente.');
    }

    private function guardarImagenMarca($archivo, string $nombreMarca): string
    {
        $slug = Str::slug($nombreMarca ?: 'marca');

        $nombreArchivo = $slug . '-' . Str::lower(Str::random(8)) . '.webp';
        $rutaRelativa = 'marcas/' . $nombreArchivo;

        $imagen = Image::read($archivo)->scaleDown(width: 1200);

        Storage::disk('public')->put(
            $rutaRelativa,
            (string) $imagen->toWebp(75)
        );

        return $rutaRelativa;
    }
    private function renombrarImagenMarca(string $rutaAnterior, string $nuevoNombreMarca): string
{
    $slug = Str::slug($nuevoNombreMarca ?: 'marca');
    $nombreNuevo = $slug . '-' . Str::lower(Str::random(8)) . '.webp';
    $rutaNueva = 'marcas/' . $nombreNuevo;

    Storage::disk('public')->move($rutaAnterior, $rutaNueva);

    return $rutaNueva;
}
}