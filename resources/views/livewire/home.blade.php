<div 
x-data="{
canLoadMore:@entangle('canLoadMore'),
scrollTop: 0,
divHeight: 0,
scrollHeight: 0
}"

@scroll.window.throttle.250ms="
scrollTop = window.scrollY || window.scrollTop;
divHeight = window.innerHeight || document.documentElement.clientHeight;
scrollHeight = document.documentElement.scrollHeight;

isScrolled = scrollTop + divHeight >= scrollHeight-1;
{{-- check if user can load more --}}

if(isScrolled &&  canLoadMore){
@this.loadMore();


}
"
class="ig-shell min-h-screen"  >
    <header class="sticky top-0 z-30 -mx-3 border-b border-slate-200 bg-white/95 px-3 py-2 backdrop-blur md:hidden">

        <div class="grid grid-cols-12 gap-2 items-center">

            <div class="col-span-3">
                <img src="{{asset('assets/logo.png')}}" class="h-10 w-auto object-contain" alt="Instagram">

            </div>

                <div class="col-span-8 flex justify-center px-2">
                    <a href="{{ route('explore') }}" class="ig-input flex items-center text-slate-500">Search</a>
                    
                </div>

            <div class="col-span-1 flex justify-center">
                <a href="#" aria-label="Activity" class="ig-icon-button">
                    <span class="text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>

                    </span>

                </a>
                
            </div>


        </div>

    </header>
    {{-- main --}}
    <div class="grid gap-8 py-4 md:py-8 lg:grid-cols-12" >

        <main class="overflow-hidden lg:col-span-8" >
            <!-- story -->
             <section> 
            <ul aria-label="Stories" class="flex items-start gap-1 overflow-x-auto py-2 scrollbar-hide sm:gap-2">
                @for ($i = 0 ; $i<18 ; $i++)
            <li class="flex flex-col justify-center w-20 gap-1 p-2 ">
                
                <div class="ig-gradient-ring mx-auto rounded-full"><x-avatar src="https://i.pravatar.cc/150?img={{$i}}" class="h-14 w-14 border-2 border-white" /></div>
                <p class="text-xs text-gray-900/95 font-medium truncate">{{fake()->name}}</p>
                
            </li>
                @endfor
            </ul>

             
             </section>

             {{-- post --}}
             <section aria-label="Feed" class="mx-auto mt-4 max-w-xl space-y-6 text-slate-900">

                @if ($posts)

                    @foreach ( $posts as $post )
                    <livewire:post.item wire:key="post-{{$post->id}}" :post="$post"/>


                    @endforeach
                    
                @else
                    <div class="ig-empty"><strong>No posts yet</strong><span>Follow people or create your first post.</span></div>
                @endif
                

             </section>

        </main>
        
        <!-- sugestions -->
        <aside class="lg:col-span-4  hidden lg:block p-4 " >
                <div class="flex items-center gap-3">
                    <x-avatar class="w-12 h-12" />
                    <div><h4 class="font-semibold text-slate-950">{{ auth()->user()->username }}</h4><p class="text-sm text-slate-500">{{ auth()->user()->name }}</p></div>

                </div>
                {{-- suggesstions --}}
                <section class="mt-4">
                    <h4 class="font-semibold text-slate-500">Suggestions for you</h4>
                    
                    
                        <ul  class="my-2 space-y-3">
                            @foreach ($suggestedUsers as $key => $user )
                            <li  class="flex items-center gap-3">

                                <a href="{{route('profile.home',$user->username)}}">
                                <x-avatar src="https://i.pravatar.cc/150?img={{ $key + 20 }}" class="h-11 w-11" />
                                </a>

                                <div class="grid grid-cols-7 w-full gap-2">
                                    <div class="col-span-5">
                                        <a href="{{route('profile.home',$user->username)}}" class="text-gray-900/95 font-semibold truncate text-sm">
                                            {{$user->name}}
                                        </a>
                                        <p class="truncate text-xs text-slate-500">Suggested for you</p>
                                    </div>


                                    <div  class="col-span-2 flex text-right justify-end">

                                        @if (auth()->user()->isFollowing($user))
                                            <button aria-label="Unfollow {{$user->username}}" wire:click="toggleFollow({{$user->user_id}})" class="min-h-11 font-semibold text-slate-500 ml-auto text-sm">Following</button>
                                        @else
                                            <button aria-label="Follow {{$user->username}}" wire:click="toggleFollow({{$user->user_id}})" class="min-h-11 font-semibold text-blue-600 ml-auto text-sm">Follow</button>
                                        @endif
                                        
                                    </div>



                                </div>
                            </li>
                            @endforeach
                        </ul>
                    
                </section>
                {{-- app link --}}
                <section class="mt-5">
                    <ol class="flex gap-2 flex-wrap">
                        <li class="text-xs text-gray-400/90 font-medium"><a href="#" class="hover:underline">About</a></li>
                        <li class="text-xs text-gray-400/90 font-medium"><a href="#" class="hover:underline">Help</a></li>
                        <li class="text-xs text-gray-400/90 font-medium"><a href="#" class="hover:underline">API</a></li>
                        <li class="text-xs text-gray-400/90 font-medium"><a href="#" class="hover:underline">Jobs</a></li>
                        <li class="text-xs text-gray-400/90 font-medium"><a href="#" class="hover:underline">Privacy</a></li>
                        <li class="text-xs text-gray-400/90 font-medium"><a href="#" class="hover:underline">Terms</a></li>
                        <li class="text-xs text-gray-400/90 font-medium"><a href="#" class="hover:underline">Locations</a></li>
                        
                    </ol>

                </section>
        </aside>

    </div>
</div>
