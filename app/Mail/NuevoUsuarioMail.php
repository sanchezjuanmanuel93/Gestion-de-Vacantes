<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevoUsuarioMail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $password)
    {
        $this->usuario = $usuario;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Gestion de Vacantes | Nuevo Usuario')
            ->view('emails.nuevoUsuario');
    }
}
