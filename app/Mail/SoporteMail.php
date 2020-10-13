<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class SoporteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $consulta;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($consulta)
    {
        $this->consulta = $consulta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Gestión de Vacantes | Soporte')
            ->replyTo(Auth::user()->email)
            ->view('emails.soporte')
            ->with('nombre', Auth::user()->nombre)
            ->with('apellido', Auth::user()->apellido)
            ->with('telefono', Auth::user()->telefono)
            ->with('email', Auth::user()->email)
            ->with('consulta', $this->consulta);
    }
}
