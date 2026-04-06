<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class MiCuentaController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $carritoActivo = Carrito::with([
            'items.producto.imagenPrincipal'
        ])
            ->where('user_id', $user->id)
            ->where('estado', 'activo')
            ->latest('id')
            ->first();

        $misCompras = Pedido::with([
            'items',
            'items.producto.imagenPrincipal',
        ])
            ->where('user_id', $user->id)
            ->latest('id')
            ->paginate(6);

        return view('web.mi-cuenta.index', compact(
            'user',
            'carritoActivo',
            'misCompras'
        ));
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'telefono' => ['nullable', 'string', 'max:20'],
        ]);

        $user->update($data);

        return redirect()
            ->route('web.mi-cuenta.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Tus datos fueron actualizados correctamente.',
            ]);
    }

    public function updatePassword(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $data = $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Debes ingresar tu contraseña actual.',
            'password.required' => 'Debes ingresar una nueva contraseña.',
            'password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ]);

        if (!Hash::check($data['current_password'], $user->password)) {
            return back()
                ->withErrors([
                    'current_password' => 'La contraseña actual es incorrecta.',
                ], 'passwordUpdate')
                ->withInput();
        }

        $user->update([
            'password' => $data['password'],
        ]);

        return redirect()
            ->route('web.mi-cuenta.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Tu contraseña fue actualizada correctamente.',
            ]);
    }
    public function favoritos()
{
    $user = Auth::user();

    $favoritos = Producto::query()
        ->with([
            'marca:id,nombre,imagen',
            'imagenPrincipal',
        ])
        ->whereHas('favoritos', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->where('estado_publicacion', 'activo')
        ->latest('id')
        ->get();

    return view('web.mi-cuenta.favoritos', compact('favoritos'));
}
}