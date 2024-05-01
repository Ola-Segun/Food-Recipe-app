

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



        <form action="{{ url('/recipes/'. $recipe->id .'/edit') }}" method="POST" enctype="multipart/form-data">

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
                        <label for="recipe_name" class="form-label">Recipe Name</label>
                        <input type="text" value="{{ $recipe->recipe_name }}" name="recipe_name" class="form-control">
                        @error('recipe_name')  <span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" value="{{ $recipe->slug }}" name="slug" class="form-control">
                        @error('slug')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>
                    <div class="mb-3">
                        <label for="small_details" class="form-label">Small Details</label>
                        <input type="text" value="{{ $recipe->small_details }}" name="small_details" class="form-control">
                        @error('small_details')  <span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="avg_cooking_time" class="form-label">Avg Cooking Time <small>in minutes</small></label>
                        <input type="text" value="{{ $recipe->avg_cooking_time }}" name="avg_cooking_time" class="form-control">
                        @error('avg_cooking_time')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>
                    <div class="mb-3">
                        <label for="tools_needed" class="form-label">Tools Needed</label>
                        <input type="text" value="{{ $recipe->tools_needed }}" name="tools_needed" class="form-control">
                        @error('tools_needed')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>
                    <div class="mb-3 form-check">
                        <label class="form-check-label" for="is_active">Is Active</label>
                        <input type="checkbox" value="{{ $recipe->is_active == true ? checked:'' }}" name="is_active" class="form-check-input">
                        @error('is_active')  <span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    
                    
                </div>
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea placeholder="Describe your Recipe" name="description" class="form-control" style="max-height: 200px;">{{ $recipe->description }}</textarea>
                        @error('description')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>
                    <div class="mb-3">
                        <label for="ingredients" class="form-label">Ingredients</label>
                        <input type="text" value="{{ $recipe->ingredients }}" name="ingredients" class="form-control">
                        @error('ingredients')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>

                    <div class="mb-3">
                        <label for="procedures" class="form-label">Procedures/Steps</label>
                        <textarea type="text" placeholder="step 1, step 2," name="procedures" class="form-control">{{ $recipe->procedures }}</textarea>
                        @error('procedures')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>
                    {{-- <div class="mb-3">
                        <label for="procedures" class="form-label">procedures</label>
                        <textarea type="text" value="" $recipe->ingredientsclass="form-control" id="procedures">{{ old('procedure') }}</textarea>
                    </div> --}}
                    
                    <div class="md-3">
                        <label for="image">Upload Image</label>
                        <img src="{{ asset($recipe->recipe_image) }}" style="width: 100px;">
                        <input type="file" name="recipe_image" class="form-control">
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

            // Ingredients
            $('#procedures').summernote({
                placeholder: '1. Procedures / steps to cook,',
                tabsize: 2,
                height: 120,
                toolbar: [
                ['style', ['']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['']],
                ['para', ['ul', 'ol', '']],
                ['table', ['']],
                ['insert', ['', '', '']],
                ['view', ['', '', '']]
                ]
            });
          </script>
    </x-slot:scripts>

</x-webapplayout>