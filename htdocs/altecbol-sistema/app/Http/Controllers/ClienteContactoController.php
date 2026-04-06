<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClienteContactoController extends Controller
{
    public function index($cliente)
    {
        $cli = DB::table('clientes')->where('id', $cliente)->first();
        abort_if(!$cli, 404);

        $contactos = DB::table('cliente_contactos')
            ->where('cliente_id', $cliente)
            ->orderByDesc('es_principal')
            ->orderBy('nombre')
            ->orderBy('apellido')
            ->get();

        return view('admin.clientes.contactos', [
            'cliente' => $cli,
            'contactos' => $contactos,
        ]);
    }

    public function store(Request $request, $cliente)
    {
        $cli = DB::table('clientes')->where('id', $cliente)->first();
        abort_if(!$cli, 404);

        $data = $request->validate([
            'nombre'   => ['required','string','max:150'],
            'apellido' => ['nullable','string','max:150'],
            'cargo'    => ['nullable','string','max:120'],
            'area'     => ['nullable','string','max:120'],
            'telefono' => ['nullable','string','max:50'],
            'celular'  => ['nullable','string','max:50'],
            // por ahora string para que NO reviente si tu columna es varchar
            'whatsapp' => ['nullable','string','max:50'],
            'email'    => ['nullable','email','max:150'],
            'estado'   => ['required','in:activo,inactivo'],
            'notas'    => ['nullable','string'],
            'es_principal' => ['nullable'],
        ]);

        try {
            DB::table('cliente_contactos')->insert([
                'cliente_id' => $cliente,
                'nombre' => $data['nombre'],
                'apellido' => $data['apellido'] ?? null,
                'cargo' => $data['cargo'] ?? null,
                'area' => $data['area'] ?? null,
                'telefono' => $data['telefono'] ?? null,
                'celular' => $data['celular'] ?? null,
                'whatsapp' => $data['whatsapp'] ?? null,
                'email' => $data['email'] ?? null,
                'es_principal' => (int) $request->boolean('es_principal'),
                'estado' => $data['estado'],
                'notas' => $data['notas'] ?? null,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('admin.clientes.contactos.index', $cliente)
                ->with('success', 'Contacto creado correctamente.');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }
    
public function edit($cliente, $contacto)
{
    $cli = DB::table('clientes')->where('id', $cliente)->first();
    abort_if(!$cli, 404);

    $contactoEdit = DB::table('cliente_contactos')
        ->where('id', $contacto)
        ->where('cliente_id', $cliente)
        ->first();
    abort_if(!$contactoEdit, 404);

    $contactos = DB::table('cliente_contactos')
        ->where('cliente_id', $cliente)
        ->orderByDesc('es_principal')
        ->orderBy('nombre')
        ->orderBy('apellido')
        ->get();

    return view('admin.clientes.contactos', [
        'cliente' => $cli,
        'contactos' => $contactos,
        'contactoEdit' => $contactoEdit,
    ]);
}
public function update(Request $request, $cliente, $contacto)
{
    // validar que exista el cliente
    $cli = DB::table('clientes')->where('id', $cliente)->first();
    abort_if(!$cli, 404);

    // validar que el contacto exista y pertenezca al cliente
    $ct = DB::table('cliente_contactos')
        ->where('id', $contacto)
        ->where('cliente_id', $cliente)
        ->first();
    abort_if(!$ct, 404);

    $data = $request->validate([
        'nombre'   => ['required', 'string', 'max:150'],
        'apellido' => ['nullable', 'string', 'max:150'],
        'cargo'    => ['nullable', 'string', 'max:120'],
        'area'     => ['nullable', 'string', 'max:120'],
        'telefono' => ['nullable', 'string', 'max:50'],
        'celular'  => ['nullable', 'string', 'max:50'],
        'whatsapp' => ['nullable', 'string', 'max:50'],
        'email'    => ['nullable', 'email', 'max:150'],
        'estado'   => ['required', 'in:activo,inactivo'],
        'notas'    => ['nullable', 'string'],
        'es_principal' => ['nullable', 'boolean'],
    ]);

    $esPrincipal = (int) $request->boolean('es_principal');

    DB::beginTransaction();
    try {
        // si este queda como principal, quita principal a los demás del mismo cliente
        if ($esPrincipal === 1) {
            DB::table('cliente_contactos')
                ->where('cliente_id', $cliente)
                ->where('id', '!=', $contacto)
                ->update([
                    'es_principal' => 0,
                    'updated_by' => Auth::id(),
                    'updated_at' => now(),
                ]);
        }

        DB::table('cliente_contactos')
            ->where('id', $contacto)
            ->where('cliente_id', $cliente)
            ->update([
                'nombre' => $data['nombre'],
                'apellido' => $data['apellido'] ?? null,
                'cargo' => $data['cargo'] ?? null,
                'area' => $data['area'] ?? null,
                'telefono' => $data['telefono'] ?? null,
                'celular' => $data['celular'] ?? null,
                'whatsapp' => $data['whatsapp'] ?? null,
                'email' => $data['email'] ?? null,
                'estado' => $data['estado'],
                'notas' => $data['notas'] ?? null,
                'es_principal' => $esPrincipal,
                'updated_by' => Auth::id(),
                'updated_at' => now(),
            ]);

        DB::commit();
    } catch (\Throwable $e) {
        DB::rollBack();
        throw $e;
    }

    return redirect()->route('admin.clientes.contactos.index', $cliente)
        ->with('success', 'Contacto actualizado correctamente.');
}
public function destroy($cliente, $contacto)
{
    // borrar SOLO si pertenece al cliente
    DB::table('cliente_contactos')
        ->where('id', $contacto)
        ->where('cliente_id', $cliente)
        ->delete();

    return redirect()->route('admin.clientes.contactos.index', $cliente)
        ->with('success', 'Contacto eliminado.');
}
}