<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

class UserTypingPublic implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;
    public $isTyping;

    public function __construct($username, $isTyping)
    {
        $this->username = $username;
        $this->isTyping = $isTyping;
    }

    public function broadcastOn()
    {
        return new Channel(env('APP_DOMAIN_ADMIN') . '_chat');
    }

    public function broadcastAs()
    {
        return 'user-typing';
    }
}

