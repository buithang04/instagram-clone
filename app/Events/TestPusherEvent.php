<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class TestEvent implements ShouldBroadcastNow
{
    public function broadcastOn(): array
    {
        return [new PrivateChannel('users.24')]; // ID test
    }

    public function broadcastAs(): string
    {
        return 'test.event';
    }

    public function broadcastWith(): array
    {
        return ['msg' => 'Hello from backend!'];
    }
}


