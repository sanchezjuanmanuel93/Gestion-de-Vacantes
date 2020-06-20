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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($vacante)
    {
        $this->vacante = $vacante;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Confirmación de la vacante ' . $this->vacante->materia->nombre . ' ' . $this->vacante->nombre_puesto)
            ->view('emails.postulacion');
    }
}
