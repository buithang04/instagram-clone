<x-profile-layout :user="$user" >
    
    <ul class="grid grid-cols-3 gap-0.5 sm:gap-1">

        @foreach ($posts as $post )
            
        @php
            $cover = $post->media()->first();
        @endphp
        
        <li onclick="Livewire.dispatch('openModal', { component: 'post.view.modal', arguments: { post: {{ $post->id }} } })"
        class="aspect-square w-full cursor-pointer overflow-hidden bg-slate-100">

            @switch($cover?->mime)
                @case('video')

                <x-video :controls="false" :cover="true" source="{{$cover->url}}" />

                    @break

                @case('image')
                    
                <img src="{{$cover->url}}" alt="image" class="h-full w-full object-cover">

                    @break
            
                    
                @default
                
                    
            @endswitch

        </li>

        @endforeach
    </ul>


</x-profile-layout>
