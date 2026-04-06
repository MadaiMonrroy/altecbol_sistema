<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        // filtros internos
        $qInterno = trim((string) $request->query('q_interno', ''));
        $roleInterno = trim((string) $request->query('role_interno', ''));
        $estadoInterno = trim((string) $request->query('estado_interno', ''));

        // filtros web
        $qWeb = trim((string) $request->query('q_web', ''));
        $estadoWeb = trim((string) $request->query('estado_web', ''));

        $usuariosInternos = User::select([
                'id',
                'name',
                'email',
                'telefono',
                'role',
                'estado',
                'last_login_at',
                'created_at',
            ])
            ->internos()
            ->when($qInterno !== '', function ($query) use ($qInterno) {
                $query->where(function ($sub) use ($qInterno) {
                    $sub->where('name', 'like', "%{$qInterno}%")
                        ->orWhere('email', 'like', "%{$qInterno}%")
                        ->orWhere('telefono', 'like', "%{$qInterno}%");
                });
            })
            ->when($roleInterno !== '', fn ($query) => $query->where('role', $roleInterno))
            ->when($estadoInterno !== '', fn ($query) => $query->where('estado', $estadoInterno))
            ->orderBy('name')
            ->get();

        $usuariosWeb = User::select([
                'id',
                'name',
                'email',
                'telefono',
                'role',
                'estado',
                'last_login_at',
                'created_at',
            ])
            ->web()
            ->when($qWeb !== '', function ($query) use ($qWeb) {
                $query->where(function ($sub) use ($qWeb) {
                    $sub->where('name', 'like', "%{$qWeb}%")
                        ->orWhere('email', 'like', "%{$qWeb}%")
                        ->orWhere('telefono', 'like', "%{$qWeb}%");
                });
            })
            ->when($estadoWeb !== '', fn ($query) => $query->where('estado', $estadoWeb))
            ->orderByDesc('id')
            ->paginate(10, ['*'], 'web_page')
            ->withQueryString();

        return view('admin.usuarios.index', compact(
            'usuariosInternos',
            'usuariosWeb',
            'qInterno',
            'roleInterno',
            'estadoInterno',
            'qWeb',
            'estadoWeb'
        ));
    }

    public function create()
    {
        $usuario = new User();

        return view('admin.usuarios.create', compact('usuario'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'max:255', 'unique:users,email'],
            'telefono' => ['nullable', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role'     => ['required', Rule::in(User::ROLES)],
            'estado'   => ['required', Rule::in(User::ESTADOS)],
        ]);

        User::create($data);

        return redirect()
            ->route('admin.usuarios.index')
            ->with('success', 'Usuario creado correctamente.');
    }

    public function show($id)
    {
        $usuario = User::findOrFail($id);

        return view('admin.usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($usuario->id)],
            'telefono' => ['nullable', 'string', 'max:30'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            'role'     => ['required', Rule::in(User::ROLES)],
            'estado'   => ['required', Rule::in(User::ESTADOS)],
        ]);

        if (blank($data['password'] ?? null)) {
            unset($data['password']);
        }

        $usuario->update($data);

        return redirect()
            ->route('admin.usuarios.edit', ['id' => $usuario->id])
            ->with('success', 'Usuario actualizado correctamente.');
    }
}