<x-webapplayout>

    <x-slot:title>
        Gallery
    </x-slot>



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

                <a href="{{ url('recipes/gallery/upload') }}" class="btn btn-info float-end">Upload Image</a>
            </div>

            <div class="col-md-12 mt-3">
                <div class="row">
                    <div class="card shadow" style="height: 70vh;">

                    </div>
                </div>
            </div>

        </div>
    </div>

</x-webapplayout>