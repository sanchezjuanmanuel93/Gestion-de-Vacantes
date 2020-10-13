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
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $password, $url)
    {
        $this->usuario = $usuario;
        $this->password = $password;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Gestión de Vacantes | Nuevo Usuario')
            ->view('emails.nuevoUsuario')
            ->with('usuario', $this->usuario)
            ->with('password', $this->password)
            ->with('url', $this->url);
    }
}
