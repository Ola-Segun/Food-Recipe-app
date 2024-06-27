<x-webapplayout>
    <x-slot:title>
        Show
    </x-slot>

    <div class="post-container h-fit grid w-full overflow-auto mb-8">
        <div class="post-info mb-12 ">
            <div class="container py-5 grid gap-10">
                
                @if (session('statuses'))
                    @foreach (session('statuses') as $status)
                        <div class="container alert alert-dismissible fade show alert-{{ $status['type'] }}" role="alert">
                            {{ $status['message'] }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                
                <div class=" justify-self-end mr-10 fixed">
                    <a href="{{ url('/posts/'.$Post->id.'/upload') }}" class="btn btn-info">+ Image</a>
                </div>
                
                <div class="post-image" style="background-image: url({{ asset($Post->Post_image) }});"></div>

                <h2 class=" text-3xl">{{$Post->Post_name}}</h2>
                <hr class=" mx-4">
                <div class="grid gap-4 mx-3">
                    <p class="">{{ $Post->description }}</p>  
                    <div class="interaction flex gap-3">
                        <div class="">Like</div>
                        <div class="seperator text-4xl" style="line-height: 0;">.</div>
                        <div class="">Share</div>
                        <div class="seperator text-4xl" style="line-height: 0;">.</div>
                        <div class="">Like</div>
                        <div class="seperator text-4xl" style="line-height: 0;">.</div>
                        <div class="">Share</div>
                    </div>
                </div>
                <hr class=" mx-4">
                
                <p>{{ $Post->post_summary }}</p>  
                <hr class=" mx-4">
                
                <p>{{ $Post->post_body }}</p> 
                <hr class=" mx-4">
            
        
            </div>

            {{-- COMMENTS LISTS SECTION --}}
            <div class="comments-group">
                <h5 class=" text-xl font-semibold mb-6">Comments</h5>
                <ul>
                    @foreach ($Post->comments as $comment)
                        <li class="comment-item">
                            {{ $comment->content }}
                            <div class="comment-interactions flex gap-3">
                                <small class="">Like</small>
                                <div class="seperator text-4xl" style="line-height: 0;">.</div>
                                <small class="">Share</small>
                            </div>
                        </li>

                    @endforeach
                </ul>
            </div>
        

            <br>
            {{-- Btns --}}
            @if($Post->user_id == auth()->id())
            <div class="flex gap-8">
                @auth        
                    <a href="{{ url('posts/'.$Post->id.'/edit') }}" class=" no-bg-btn bg-blue-400 hover:bg-blue-500 ">
                        Edit
                    </a>
            
                    <a href="{{ url('posts/'.$Post->id.'/delete') }}" onclick="return confirm('Are You Sure? ')" class=" no-bg-btn bg-red-400 hover:bg-red-500 ">
                        Delete
                    </a>
                @endauth
            </div>
            @endif
        </div>


        {{-- RELATED POSTS --}}
        <div class="related-posts" style="">
            <div class="related-info">
                <h2 class=" font-bold text-4xl">Catch up on Related posts</h2>
                <br>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci, unde.</p>
                <hr>
                <br>
            </div>
            <div class="items-container flex flex-wrap justify-around gap-5">
                <div class="postItem">
                    <img src="" alt="" class=" bg-slate-100 w-40 h-52 rounded-sm">
                    {{-- <div class="display bg-slate-100 w-56 h-36 rounded-sm" style="background-image: url({{ asset($post->Post_image) }}); background-size:cover; background-position:center;"></div> --}}
    
                    <div class="info">
                        {{-- <p class=" font-semibold">{{$post->Post_name}}</p> --}}
                        <p class=" font-semibold">Testing Post name</p>
                    </div>
                </div>
                <div class="postItem">
                    <img src="" alt="" class=" bg-slate-100 w-40 h-52 rounded-sm">
                    {{-- <div class="display bg-slate-100 w-56 h-36 rounded-sm" style="background-image: url({{ asset($post->Post_image) }}); background-size:cover; background-position:center;"></div> --}}
    
                    <div class="info">
                        {{-- <p class=" font-semibold">{{$post->Post_name}}</p> --}}
                        <p class=" font-semibold">Testing Post name</p>
                    </div>
                </div>
                <div class="postItem">
                    <img src="" alt="" class=" bg-slate-100 w-40 h-52 rounded-sm">
                    {{-- <div class="display bg-slate-100 w-56 h-36 rounded-sm" style="background-image: url({{ asset($post->Post_image) }}); background-size:cover; background-position:center;"></div> --}}
    
                    <div class="info">
                        {{-- <p class=" font-semibold">{{$post->Post_name}}</p> --}}
                        <p class=" font-semibold">Testing Post name</p>
                    </div>
                </div>
                <div class="postItem">
                    <img src="" alt="" class=" bg-slate-100 w-40 h-52 rounded-sm">
                    {{-- <div class="display bg-slate-100 w-56 h-36 rounded-sm" style="background-image: url({{ asset($post->Post_image) }}); background-size:cover; background-position:center;"></div> --}}
    
                    <div class="info">
                        {{-- <p class=" font-semibold">{{$post->Post_name}}</p> --}}
                        <p class=" font-semibold">Testing Post name</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- MAKE COMMENTS FORM --}}
    <form action="{{ route("post.comments.store", $Post->id) }}" method="POST" class="comment-form pl-7 p-3 m-0 fixed bottom-0 left-0 w-full bg-slate-500" style="">
        @csrf
        <input name="content" type="text" placeholder="Write your comment" class="form-control" style="width: 90%">
        <button type="submit" class="no-bg-btn bg-green-400 hover:bg-green-500">Send</button>
    </form>

</x-webapplayout>

