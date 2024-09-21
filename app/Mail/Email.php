<?php

namespace App\Mail;

use App\Models\Transferencia;
use App\Models\User;
use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $dados;

    /**
     * Create a new message instance.
     */
    public function __construct($dados)
    {
        $this->dados = $dados;
    }


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        $destinatario = $this->dados['destinatario'];
        $valor = $this->dados['valor'];
        $remetente = $this->dados['remetente'];

        return $this
            ->view('emails.email')
            ->with(['destinatario' => $destinatario, 'valor' => $valor, 'remetente' => $remetente]);
    }
}
