<?php

namespace App\Listeners;

use App\Events\EnvioEmail;
use App\Mail\Email;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EnvioEmailListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EnvioEmail $event): void
    {
        Mail::to($event->dados->emailDestinatario)->send(new Email($event->dados));
    }
}
