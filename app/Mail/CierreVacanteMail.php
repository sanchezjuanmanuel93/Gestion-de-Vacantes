<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class CierreVacanteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $vacantes;
    public $fechaHora;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fechaHora, $vacantes)
    {
        $this->vacantes = $vacantes;
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
            ->subject('Gestión de Vacantes | Cierre de Vacantes')
            ->view('emails.cierreVacantes')
            ->with('fechaHora', $this->fechaHora)
            ->with('vacantes', $this->vacantes);
    }
}
