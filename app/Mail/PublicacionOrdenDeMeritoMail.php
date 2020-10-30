<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class PublicacionOrdenDeMeritoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $vacante;
    public $fechaHora;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fechaHora, $vacante)
    {
        $this->vacante = $vacante;
        $this->fechaHora = $fechaHora;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Gestión de Vacantes | Publicación de Orden de Mérito')
            ->view('emails.publicacionOrdenDeMerito')
            ->with('fechaHora', $this->fechaHora)
            ->with('vacante', $this->vacante);
    }
}
