<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAreaAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (! $user) {
            return redirect()->away(env('APP_ADMIN_URL'));
        }

        $rolesInternos = [
            'admin',
            'comercial',
            'soporte_1',
            'soporte_2',
            'soporte_3',
            'finanzas',
        ];

        if (! in_array($user->role, $rolesInternos, true)) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->away(env('APP_ADMIN_URL'));
        }

        if (($user->estado ?? null) !== 'activo') {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->away(env('APP_ADMIN_URL'));
        }

        return $next($request);
    }
}