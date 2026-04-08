<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();

    $user = Auth::user();

    if (! $user) {
        return redirect()->route('login')->withErrors([
            'email' => 'No se pudo iniciar sesión.',
        ]);
    }

    $rolesConMultiplesSesiones = ['comprador_web'];

    if (! in_array($user->role, $rolesConMultiplesSesiones, true)) {
        Auth::logoutOtherDevices($request->password);

        DB::table('sessions')
            ->where('user_id', $user->id)
            ->where('id', '!=', $request->session()->getId())
            ->delete();
    }

    if ($user->role === 'comprador_web') {
        return redirect()->route('web.mi-cuenta.index');
    }

    if ($user->role === 'admin') {
        return redirect()->away(env('APP_ADMIN_URL') . '/dashboard');
    }

    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login')->withErrors([
        'email' => 'No tienes un rol válido para acceder.',
    ]);
}

    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();

        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($user && $user->role === 'admin') {
            return redirect()->away(env('APP_ADMIN_URL'));
        }

        return redirect('/');
    }
}