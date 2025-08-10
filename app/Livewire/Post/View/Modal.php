<?php

namespace App\Livewire\Post\View;

use App\Models\Post;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{

    public $post;

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function modalMaxWidth(): string
    {
        return  '5xl';
    }

    function mount(){
        $this->post = Post::findOrFail($this->post);
        #get url 
        $url = url('post/'.$this->post->id);

        #push state using new livewwrire v3 js helper
        $this->js("history.pushState({},'','{$url}')");
    }
    public function render()
    {


        return <<<'BLADE'
        <main class=" bg-white h-[calc(100vh_-_3.5rem)] p-2 md:h-[calc(100vh_-_3.5rem)] flex flex-col border gap-y-4 px-5 text-gray-800 ">

            <livewire:post.view.item :post='$this->post'/>
        </main>
        BLADE;
    }
}
