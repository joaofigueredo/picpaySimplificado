<?php

namespace App\Jobs;

use App\Mail\Email;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TestJob implements ShouldQueue
{
    use Queueable;

    protected $dados;

    /**
     * Create a new job instance.
     */
    public function __construct($dados)
    {
        $this->dados = $dados;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $email = $this->dados['emailDestinatario'];
        if (empty($email)) {
            Log::error('Endereço de e-mail não fornecido para o envio.');
            return;
        } else {
            log::info('email ok');
        }
        Mail::to($email)->send(new Email($this->dados));
    }
}
