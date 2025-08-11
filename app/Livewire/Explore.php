<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Explore extends Component
{


    #[On('closeModal')]
    function reverUrl(){
        $this->js("history.replaceState({},'','/')");
    }

    public function render()
    {
        $posts = Post::limit(20)->get();
        return view('livewire.explore',['posts' => $posts]);
    }
}
