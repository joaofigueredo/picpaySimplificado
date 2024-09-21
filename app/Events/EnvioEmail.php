<?php

namespace App\Events;

use App\Models\Transferencia;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EnvioEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $dados;

    /**
     * Create a new event instance.
     */
    public function __construct(Transferencia $dados)
    {
        $this->dados = $dados;
    }
}