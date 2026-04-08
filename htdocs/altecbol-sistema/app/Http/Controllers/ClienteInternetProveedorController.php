<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClienteInternetProveedorController extends Controller
{
    private string $table = 'cliente_internet_proveedores';

    public function index(int $cliente)
    {
        $proveedores = DB::table($this->table)
            ->where('cliente_id', $cliente)
            ->orderByDesc('id')
            ->get();

        return view('admin.clientes.proveedores', [
            'clienteId' => $cliente,
            'proveedores' => $proveedores,
            'proveedorEdit' => null,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        // create
        DB::table($this->table)->insert([
            'cliente_id' => (int) $data['cliente_id'],
            'codigo_servicio' => $data['codigo_servicio'],
            'alias_servicio' => $data['alias_servicio'] ?? null,
            'tipo_servicio' => $data['tipo_servicio'],
            'direccion_instalacion' => $data['direccion_instalacion'] ?? null,
            'ciudad' => $data['ciudad'] ?? null,
            'departamento' => $data['departamento'] ?? null,
            'ancho_banda_down_mbps' => $data['ancho_banda_down_mbps'] ?? null,
            'ancho_banda_up_mbps' => $data['ancho_banda_up_mbps'] ?? null,
            'medio' => $data['medio'] ?? null,
            'ip_publica' => $data['ip_publica'] ?? null,
            'asesor_nombre' => $data['asesor_nombre'] ?? null,
            'asesor_telefono' => $data['asesor_telefono'] ?? null,
            'asesor_email' => $data['asesor_email'] ?? null,
            'soporte_nombre' => $data['soporte_nombre'] ?? null,
            'soporte_telefono' => $data['soporte_telefono'] ?? null,
            'soporte_email' => $data['soporte_email'] ?? null,
            'estado' => $data['estado'] ?? 'activo',
            'notas' => $data['notas'] ?? null,
            'created_by' => Auth::id(),
'updated_by' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('admin.clientes.proveedores.index', (int) $data['cliente_id'])
            ->with('success', 'Proveedor creado.');
    }

    public function edit(int $id)
    {
        $proveedorEdit = DB::table($this->table)->where('id', $id)->first();
        abort_if(!$proveedorEdit, 404);

        $clienteId = (int) $proveedorEdit->cliente_id;

        $proveedores = DB::table($this->table)
            ->where('cliente_id', $clienteId)
            ->orderByDesc('id')
            ->get();

        return view('admin.clientes.proveedores', [
            'clienteId' => $clienteId,
            'proveedores' => $proveedores,
            'proveedorEdit' => $proveedorEdit,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $proveedor = DB::table($this->table)->where('id', $id)->first();
        abort_if(!$proveedor, 404);

        $data = $this->validatedData($request, true);

        DB::table($this->table)->where('id', $id)->update([
            'codigo_servicio' => $data['codigo_servicio'],
            'alias_servicio' => $data['alias_servicio'] ?? null,
            'tipo_servicio' => $data['tipo_servicio'],
            'direccion_instalacion' => $data['direccion_instalacion'] ?? null,
            'ciudad' => $data['ciudad'] ?? null,
            'departamento' => $data['departamento'] ?? null,
            'ancho_banda_down_mbps' => $data['ancho_banda_down_mbps'] ?? null,
            'ancho_banda_up_mbps' => $data['ancho_banda_up_mbps'] ?? null,
            'medio' => $data['medio'] ?? null,
            'ip_publica' => $data['ip_publica'] ?? null,
            'asesor_nombre' => $data['asesor_nombre'] ?? null,
            'asesor_telefono' => $data['asesor_telefono'] ?? null,
            'asesor_email' => $data['asesor_email'] ?? null,
            'soporte_nombre' => $data['soporte_nombre'] ?? null,
            'soporte_telefono' => $data['soporte_telefono'] ?? null,
            'soporte_email' => $data['soporte_email'] ?? null,
            'estado' => $data['estado'] ?? $proveedor->estado ?? 'activo',
            'notas' => $data['notas'] ?? null,
            'updated_by' => Auth::id(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('admin.clientes.proveedores.index', (int) $proveedor->cliente_id)
            ->with('success', 'Proveedor actualizado.');
    }

    public function destroy(int $id)
    {
        $proveedor = DB::table($this->table)->where('id', $id)->first();
        abort_if(!$proveedor, 404);

        DB::table($this->table)->where('id', $id)->delete();

        return redirect()
            ->route('admin.clientes.proveedores.index', (int) $proveedor->cliente_id)
            ->with('success', 'Proveedor eliminado.');
    }

    private function validatedData(Request $request, bool $isUpdate = false): array
    {
        // En update NO necesito cliente_id en el form si no quieres; pero en tu blade lo mandamos igual.
        $rules = [
            'cliente_id' => $isUpdate ? ['nullable','integer'] : ['required','integer'],
            'codigo_servicio' => ['required','string','max:80'],
            'alias_servicio' => ['nullable','string','max:120'],
            'tipo_servicio' => ['required','in:business,hogar,otro'],
            'direccion_instalacion' => ['nullable','string','max:255'],
            'ciudad' => ['nullable','string','max:80'],
            'departamento' => ['nullable','string','max:80'],
            'ancho_banda_down_mbps' => ['nullable','integer','min:0'],
            'ancho_banda_up_mbps' => ['nullable','integer','min:0'],
            'medio' => ['nullable','in:fibra,coaxial,hfc,otro'],
            'ip_publica' => ['nullable','string','max:45'],

            'asesor_nombre' => ['nullable','string','max:120'],
            'asesor_telefono' => ['nullable','string','max:30'],
            'asesor_email' => ['nullable','string','max:180'],

            'soporte_nombre' => ['nullable','string','max:120'],
            'soporte_telefono' => ['nullable','string','max:30'],
            'soporte_email' => ['nullable','string','max:180'],

            'estado' => ['nullable','in:activo,suspendido,baja'],
            'notas' => ['nullable','string'],
        ];

        return $request->validate($rules);
    }
}