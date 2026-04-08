<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.admin-login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt(
            $request->only('email', 'password'),
            $request->boolean('remember')
        )) {
            throw ValidationException::withMessages([
                'email' => 'Credenciales incorrectas.',
            ]);
        }

        $request->session()->regenerate();

        $rolesInternos = [
            'admin',
            'comercial',
            'soporte_1',
            'soporte_2',
            'soporte_3',
            'finanzas',
        ];

        if (! in_array(auth()->user()->role, $rolesInternos, true) || auth()->user()->estado !== 'activo') {
            Auth::logout();

            throw ValidationException::withMessages([
                'email' => 'No tienes acceso al área administrativa.',
            ]);
        }

        return redirect()->route('admin.dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}