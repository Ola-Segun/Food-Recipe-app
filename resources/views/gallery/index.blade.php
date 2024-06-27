<x-webapplayout>

    <x-slot:title>
        Gallery
    </x-slot>

    {{-- @push('styles')
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @endpush
    
    @push('script')
        <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
    @endpush --}}

    <div class="container">

        <div class="py-5 px-5">

            @if (session('statuses'))
                @foreach (session('statuses') as $status)
                    <div class="container alert alert-dismissible fade show alert-{{ $status['type'] }}" role="alert">
                        {{ $status['message'] }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif

            <div class="d-flex" style="justify-content: space-between;">
                <h3>
                    Gallery
                </h3>

                <a href="{{ url('posts/gallery/upload') }}" class="btn btn-info float-end">Upload Image</a>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card shadow" style="height: 70vh; display: ruby-text; padding: 30px; overflow-y: scroll;">
                    @foreach ($gallery as $gaImg)
                        <a href="{{ url('posts/gallery/'.$gaImg->id.'/delete') }}" onclick="return confirm('Do You want to delete?')">
                            <img src="{{ asset($gaImg->image) }}" class="" alt="" style="width:150px;">
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    

</x-webapplayout>