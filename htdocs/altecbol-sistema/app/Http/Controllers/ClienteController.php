<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $estado = strtolower((string) $request->query('estado', ''));
        $tipoCliente = strtolower((string) $request->query('tipo_cliente', ''));
        $tipoServicio = strtolower((string) $request->query('tipo_servicio', ''));

        $clientes = Cliente::select([
                'id',
                'codigo_cliente',
                'razon_social',
                'nit',
                'tipo_cliente',
                'pais',
                'direccion',
                'tipo_servicio',
                'estado',
                'notas',
            ])
            ->buscar($q)
            ->estado($estado)
            ->tipoCliente($tipoCliente)
            ->tipoServicio($tipoServicio)
            ->orderBy('razon_social')
            ->get();

        return view('admin.clientes.index', compact(
            'clientes',
            'q',
            'estado',
            'tipoCliente',
            'tipoServicio'
        ));
    }

    public function create()
    {
        return view('admin.clientes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo_cliente' => ['required', 'string', 'max:50'],
            'razon_social'   => ['required', 'string', 'max:255'],
            'nit'            => ['nullable', 'string', 'max:50'],
            'tipo_cliente'   => ['nullable', 'string', 'max:50'],
            'pais'           => ['nullable', 'string', 'max:80'],
            'direccion'      => ['nullable', 'string', 'max:255'],
            'tipo_servicio'  => ['nullable', 'string', 'max:255'],
            'estado'         => ['required', 'string', 'max:20'],
            'notas'          => ['nullable', 'string'],
        ]);

        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();

        Cliente::create($data);

        return redirect()
            ->route('admin.clientes.index')
            ->with('success', 'Cliente creado correctamente.');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('admin.clientes.create', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $data = $request->validate([
            'codigo_cliente' => ['required', 'string', 'max:50'],
            'razon_social'   => ['required', 'string', 'max:255'],
            'nit'            => ['nullable', 'string', 'max:50'],
            'tipo_cliente'   => ['nullable', 'string', 'max:50'],
            'pais'           => ['nullable', 'string', 'max:80'],
            'direccion'      => ['nullable', 'string', 'max:255'],
            'tipo_servicio'  => ['nullable', 'string', 'max:255'],
            'estado'         => ['required', 'string', 'max:20'],
            'notas'          => ['nullable', 'string'],
        ]);

        $data['updated_by'] = Auth::id();

        $cliente->update($data);

        return redirect()
            ->route('admin.clientes.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }

    public function inactivar($id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->update([
            'estado' => 'Inactivo',
            'updated_by' => Auth::id(),
        ]);

        return redirect()
            ->route('admin.clientes.index')
            ->with('success', 'Cliente marcado como Inactivo.');
    }

    public function activar($id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->update([
            'estado' => 'Activo',
            'updated_by' => Auth::id(),
        ]);

        return redirect()
            ->route('admin.clientes.index')
            ->with('success', 'Cliente marcado como Activo.');
    }
}