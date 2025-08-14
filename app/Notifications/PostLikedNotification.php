<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Notifications\Notification;

class PostLikedNotification extends Notification implements ShouldBroadcastNow
{
    use Queueable;

    public function __construct(public User $user, public Post $post)
    {
    }

    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'user_id' => $this->user->id ?? $this->user->user_id,
            'post_id' => $this->post->id,
        ];
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('users.' . ($this->post->user->id ?? $this->post->user->user_id))
        ];
    }

  
}
