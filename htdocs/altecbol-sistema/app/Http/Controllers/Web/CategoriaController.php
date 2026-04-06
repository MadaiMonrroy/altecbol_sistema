<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $estado = $request->query('estado');

        $query = Categoria::query();

        if ($estado !== null && $estado !== '') {
            $query->where('estado', $estado);
        }

        $categorias = $query
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.productos.categorias.index', compact(
            'categorias',
            'estado'
        ));
    }

    public function create()
    {
        return view('admin.productos.categorias.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:150', 'unique:categorias,nombre'],
            'descripcion' => ['nullable', 'string'],
            'estado' => ['required', Rule::in(['activo', 'inactivo'])],
        ]);

        Categoria::create($data);

        return redirect()
            ->route('admin.productos.categorias.index')
            ->with('success', 'Categoría registrada correctamente.');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('admin.productos.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $data = $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:150',
                Rule::unique('categorias', 'nombre')->ignore($categoria->id),
            ],
            'descripcion' => ['nullable', 'string'],
            'estado' => ['required', Rule::in(['activo', 'inactivo'])],
        ]);

        $categoria->update($data);

        return redirect()
            ->route('admin.productos.categorias.index', $categoria->id)
            ->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

        return redirect()
            ->route('admin.productos.categorias.index')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}