

<x-webapplayout>
    {{-- <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
     --}}

    <div class="container py-5">

        <x-slot:title>
            Create
        </x-slot:title>



        <form action="{{ url('/recipes/create') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row justify-content-around">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="recipe_name" class="form-label">Recipe Name</label>
                        <input type="text" value="{{ old('recipe_name') }}" name="recipe_name" class="form-control">
                        @error('recipe_name')  <span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" value="{{ old('slug') }}" name="slug" class="form-control">
                        @error('slug')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>
                    <div class="mb-3">
                        <label for="small_details" class="form-label">Small Details</label>
                        <input type="text" value="{{ old('small_details') }}" name="small_details" class="form-control">
                        @error('small_details')  <span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="avg_cooking_time" class="form-label">Avg Cooking Time <small>in minutes</small></label>
                        <input type="text" value="{{ old('avg_cooking_time') }}" name="avg_cooking_time" class="form-control">
                        @error('avg_cooking_time')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>
                    <div class="mb-3">
                        <label for="tools_needed" class="form-label">Tools Needed</label>
                        <input type="text" value="{{ old('tools_needed') }}" name="tools_needed" class="form-control">
                        @error('tools_needed')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>
                    <div class="mb-3 form-check">
                        <label class="form-check-label" for="is_active">Is Active</label>
                        <input type="checkbox" value="{{ old('is_active') }}" name="is_active" class="form-check-input">
                        @error('is_active')  <span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    
                    
                </div>
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea placeholder="Describe your Recipe" name="description" text="sdgsdgs" class="form-control" style="max-height: 200px;">{{ old('description') }}</textarea>
                        @error('description')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>
                    <div class="mb-3">
                        <label for="ingredients" class="form-label">Ingredients</label>
                        <input type="text" value="{{ old('ingredients') }}" name="ingredients" class="form-control">
                        @error('ingredients')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>

                    <div class="mb-3">
                        <label for="procedures" class="form-label">Procedures/Steps</label>
                        <textarea type="text" placeholder="step 1, step 2," name="procedures" class="form-control">{{ old('procedures') }}</textarea>
                        @error('procedures')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>

                    <div class="md-3">
                        <label for="image">Upload Image</label>
                        <input type="file" name="recipe_image" class="form-control">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="procedures" class="form-label">procedures</label>
                        <textarea type="text" value="" name="procedures" class="form-control" id="procedures">{{ old('procedure') }}</textarea>
                    </div> --}}
                    
                    <div class="mb-3 py-2">
                        <button class="btn btn-primary" type="submit">Save</button>
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