<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class TestEvent implements ShouldBroadcastNow
{
    public function broadcastOn(): array
    {
        return [new PrivateChannel('users.24')];
    }

    public function broadcastWith(): array
    {
        return ['msg' => 'hello'];
    }

    public function broadcastAs(): string
    {
        return 'test.event';
    }
}