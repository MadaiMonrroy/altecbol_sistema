<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoWebMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $datos;

    public function __construct(array $datos)
    {
        $this->datos = $datos;
    }

    public function build()
    {
        return $this->subject('Nuevo mensaje desde el formulario de contacto - ALTECBOL')
            ->view('emails.contacto-web');
    }
}