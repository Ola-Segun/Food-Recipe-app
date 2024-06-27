

<x-webapplayout>
    <!-- include libraries(jQuery, bootstrap) -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
    
    <!-- include summernote css/js -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    

    <div class="container py-5">

        <x-slot:title>
            Edit
        </x-slot:title>

        @if (session('statuses'))
            @foreach (session('statuses') as $status)
                <div class="container alert alert-dismissible fade show alert-{{ $status['type'] }}" role="alert">
                    {{ $status['message'] }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif



        <form action="{{ url('/posts/'. $Post->id .'/edit') }}" method="POST" enctype="multipart/form-data">

            {{-- @if ($errors->any())
                @foreach ($errors->all() as $error)
                    {{$error}}
                @endforeach
            @endif --}}

            @csrf

            @method('PUT')
            <div class="row justify-content-around">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="Post_name" class="form-label">Post Name</label>
                        <input type="text" value="{{ $Post->Post_name }}" name="Post_name" class="form-control">
                        @error('Post_name')  <span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" value="{{ $Post->slug }}" name="slug" class="form-control">
                        @error('slug')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>
                    <div class="mb-3">
                        <label for="post_summary" class="form-label">Small Details</label>
                        <input type="text" value="{{ $Post->post_summary }}" name="post_summary" class="form-control">
                        @error('post_summary')  <span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <input type="text" value="{{ $Post->tags }}" name="tags" class="form-control">
                        @error('tags')  <span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="mb-3 form-check">
                        <label class="form-check-label" for="is_active">Is Active</label>
                        <input type="checkbox" {{ $Post->is_active == true ? 'checked':'' }} name="is_active" class="form-check-input">
                    </div>
                    
                    
                </div>
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea placeholder="Describe your Post" name="description" class="form-control" style="max-height: 200px;">{{ $Post->description }}</textarea>
                        @error('description')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>

                    <div class="mb-3">
                        <label for="post_body" class="form-label">post_body/Steps</label>
                        <textarea type="text" placeholder="step 1, step 2," name="post_body" class="form-control">{{ $Post->post_body }}</textarea>
                        @error('post_body')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>
                    
                    <div class="md-3">
                        <label for="image">Upload Image</label>
                        <img src="{{ asset($Post->Post_image) }}" style="width: 100px;">
                        <input type="file" name="Post_image" class="form-control">
                    </div>

                    <div class="mb-3 py-2">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                    {{-- <textarea id="summernote" name="editordata"></textarea> --}}
                      
                </div>
            </div>
        </form>

    </div>

    <x-slot:scripts>
        <script type="text/javascript">
          </script>
    </x-slot:scripts>

</x-webapplayout>