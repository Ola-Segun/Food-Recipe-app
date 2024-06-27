<x-webapplayout>

    <x-slot:title>
        Home
    </x-slot>


    <div class=" h-full w-full grid gap-10">

    <div class="py-5 grid gap-10 justify-self-center">

        @if (session('statuses'))
            @foreach (session('statuses') as $status)
                <div class="container absolute alert alert-dismissible fade show alert-{{ $status['type'] }}" role="alert">
                    {{ $status['message'] }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
    

        {{-- Label Component Extenstion example --}}
        <x-forms.label value='My label' />

        {{-- Label Component Extenstion example --}}
        {{-- <x-forms.label>
            Testing Slots
        </x-forms.label> --}}
        @foreach ($filters as $filter)
        <p>Showing Results for : <span><strong>{{ $filter }}</strong></span></p>
        @endforeach


        <div class=" ">

            <h3>
                <a href="{{ url('/posts/create')}}" class="btn flex-nowrap whitespace-nowrap">Add Post</a>
            </h3>
        </div>

        <div class="flex flex-wrap justify-center justify-self-center">
            {{-- Loop Through all Posts --}}
            @foreach ($Posts as $Post)

                    <div class="img-cover shadow-lg" style="background-image: url({{ asset($Post->Post_image) }}); background-size:cover; background-position:center;" >

                        <div class="details text-white">

                            <a href="/posts/{{ $Post->id }}/view">
                                <h2 class=" font-bold text-xl text-balance">{{$Post->Post_name}}</h2>
                            </a>
    
                                @php
                                    $tags = explode(',', $Post->tags);
                                @endphp
                            <div  class="flex justify-around h-fit">

                                @foreach ($tags as $tag)                        
                                <a href="posts?tag={{$tag}}" style="margin: 5px;">
                                    <em>{{$tag}}</em>
                                </a>
                                @endforeach
                            </div>
                            <div class="comment-interactions flex gap-3">
                                <div class="">Like</div>
                                <div class="seperator text-4xl" style="line-height: 0;">.</div>
                                <div class="">Share</div>
                            </div>
                            
                        </div>
                    </div>
                   
            @endforeach
        </div>
    </div>

    {{-- pagination --}}
    {{ $Posts->links() }}

    </div>

<x-slot:scripts>

</x-slot:scripts>

</x-webapplayout>