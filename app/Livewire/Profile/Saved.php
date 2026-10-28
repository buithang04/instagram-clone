<?php

namespace App\Livewire\Profile;

use App\Models\Post;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Saved extends Component
{   
    public $user;


     #[On('closeModal')]
    function reverUrl(){
        $this->js("history.replaceState({},'','/profile/{$this->user->username}/saved')");
    }


    function toggleFollow(){
        abort_unless(auth()->check(),401);
        auth()->user()->toggleFollow($this->user);
    }


    public function mount($user){
        $this->user = User::whereUsername($user)->withCount(['followers','followings','posts'])->firstOrFail();
    }


    public function render()
    {   
        $this->user = User::whereUsername($this->user->username)->withCount(['followers','followings','posts'])->firstOrFail();

        $posts = Post::with('media')
            ->whereHas('favorites', fn ($query) => $query->where('favorites.user_id', $this->user->getKey()))
            ->latest()
            ->get();

        return view('livewire.profile.saved',['posts'=>$posts]);
    }
}
