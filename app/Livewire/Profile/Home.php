<?php

namespace App\Livewire\Profile;

use App\Models\User;
use App\Notifications\NewFollowerNotification;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{
    public $user;


     #[On('closeModal')]
    function reverUrl(){
        $this->js("history.replaceState({},'','/')");
    }


function toggleFollow(){
    abort_unless(auth()->check(),401);
    auth()->user()->toggleFollow($this->user);

    if(auth()->user()->isFollowing($this->user)){
        $this->user->notify(
            new \App\Notifications\NewFollowerNotification(
                auth()->user(), 
                $this->user->user_id
            )
        );
    }
}

     function mount($user){
        $this->user = User::whereUsername($user)->withCount(['followers','followings','posts'])->firstOrFail();
    }


    public function render()
    {   
        $this->user = User::whereUsername($this->user->username)->withCount(['followers','followings','posts'])->firstOrFail();

        $posts= $this->user->posts()->where('type','post')->get();

        return view('livewire.profile.home',['posts'=>$posts]);
    }
}
