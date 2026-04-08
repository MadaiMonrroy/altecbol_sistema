<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\ContactoWebMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index()
    {
        return view('web.contacto');
    }

    public function enviar(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'empresa' => ['nullable', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'telefono' => ['nullable', 'string', 'max:50'],
            'tipo_consulta' => ['nullable', 'string', 'max:100'],
            'mensaje' => ['required', 'string', 'max:3000'],
        ]);

        Mail::to([
            'mmonrroy@altecbol.com.bo',
            'info@altecbol.com.bo',
        ])->send(
            (new ContactoWebMail($datos))
                ->replyTo($datos['email'], $datos['nombre'])
        );

        return back()->with('success', 'Gracias por contactarte con ALTECBOL. Te responderemos pronto.');
    }
}