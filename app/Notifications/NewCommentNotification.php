<?php

namespace App\Notifications;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Notifications\Notification;

class NewCommentNotification extends Notification implements ShouldBroadcastNow
{
    use Queueable;

    protected $commentId;
    protected $userId;      // người comment
    protected $receiverId;  // người nhận thông báo

    public function __construct(User $user, Comment $comment, $receiverId)
    {
        $this->userId     = $user->user_id;
        $this->commentId  = $comment->id;
        $this->receiverId = $receiverId;
    }

    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'user_id'    => $this->userId,
            'comment_id' => $this->commentId,
        ];
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('users.' . $this->receiverId)
        ];
    }
}
