<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessagesSend implements ShouldBroadcast
{
    public $message = null;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('chat');
        // TODO: Implement broadcastOn() method.
    }

    public function broadcastAs()
    {

        return 'send.message';
    }
}
