<x-webapplayout>

    <x-slot:title>
        My Posts
    </x-slot>

    <style>

    </style>

    <div class=" h-full w-full">

    <div class="py-5 px-5 grid gap-10">

        @if (session('statuses'))
            @foreach (session('statuses') as $status)
                <div class="container alert alert-dismissible fade show alert-{{ $status['type'] }}" role="alert">
                    {{ $status['message'] }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif


    <div class="filter-dashboard bg-slate-200 p-1 px-3">
        <div class="filter-btn px-3 py-1 bg-slate-300 w-fit rounded-md">
            Filter<span class="mx-2"><small>V</small></span>
        </div>
    </div>
        
    <div class="postGroup w-full flex flex-wrap gap-4 justify-self-center justify-evenly">
        @foreach($Posts as $post)
            @if($post->user_id == auth()->id())
            <a href="/posts/{{ $post->id }}/view" class="postItem">
                {{-- <img src="{{ asset($post->Post_image) }}" alt="" class=" bg-slate-100 w-56 h-36 rounded-sm"> --}}
                <div class="display bg-slate-100 w-56 h-36 rounded-md shadow-lg" style="background-image: url({{ asset($post->Post_image) }}); background-size:cover; background-position:center;"></div>

                <div class="info">
                    <p class=" font-semibold">{{$post->Post_name}}</p>
                </div>
            </a>
            @endif
        @endforeach
    </div>



<x-slot:scripts>

</x-slot:scripts>

</x-webapplayout>