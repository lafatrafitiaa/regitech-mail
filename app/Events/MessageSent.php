<?php

namespace App\Events;

use App\Models\Messages;
use App\Models\Utilisateur;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use PhpParser\Node\Expr\Cast\String_;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string
     */
    public $idUtilisateur;
    /**
     * Message details
     *
     * @var string
     */
    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $message, string $idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('Utilisateur-'.$this->idUtilisateur);
    }

    public function broadcastAs()
    {
        return 'my-event';
    }

}
