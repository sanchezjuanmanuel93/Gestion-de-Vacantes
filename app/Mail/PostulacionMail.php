<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostulacionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $vacante;
    public $usuario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($vacante, $usuario)
    {
        $this->vacante = $vacante;
        $this->usuario = $usuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Gestión de Vacantes | Confirmación vacante')
            ->view('emails.postulacion')
            ->with('vacante', $this->vacante)
            ->with('usuario', $this->usuario);
    }
}
