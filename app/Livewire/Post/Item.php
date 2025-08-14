<?php

namespace App\Livewire\Post;

use App\Models\Comment;
use App\Models\Post;
use App\Notifications\NewCommentNotification;
use App\Notifications\PostLikedNotification;
use Livewire\Component;

class Item extends Component
{   

    public Post $post;
    public $body;


    function togglePostLike(){{
        abort_unless(auth()->check(),401);
        
        auth()->user()->toggleLike($this->post);

        if($this->post->isLikedBy(auth()->user())){
        if($this->post->user_id != auth()->id()){

            $this->post->user->notify(new PostLikedNotification(auth()->user(),$this->post));
        }
    }
}}

    function toggleFavorite(){{
        abort_unless(auth()->check(),401);
        
        auth()->user()->toggleFavorite($this->post);
    }}


    function toggleCommentLike( Comment $comment){{
        abort_unless(auth()->check(),401);
        
        auth()->user()->toggleLike($comment);
    }}
    function addComment(){
        $this->validate(['body'=>'required']);

        # creat comment
         $comment= Comment::create([
            'body'=> $this->body,
            
            'commentable_id'=> $this->post->id,
            'commentable_type'=> Post::class,
            'user_id'=> auth()->id(),

        ]);

        $this->reset('body');

        #notify user
        if ($this->post->user_id != auth()->id()) {
    $receiverId = $this->post->user_id;

    $this->post->user->notify(
        new NewCommentNotification(auth()->user(), $comment, $receiverId)
    );
}

    }
    public function render()
    {
        
        return view('livewire.post.item');
    }
}
