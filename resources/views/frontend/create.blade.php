

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



        <form action="{{ url('/posts/create') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row justify-content-around">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="Post_name" class="form-label">Post Name</label>
                        <input type="text" value="{{ old('Post_name') }}" name="Post_name" class="form-control">
                        @error('Post_name')  <span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" value="{{ old('slug') }}" name="slug" class="form-control">
                        @error('slug')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>
                    <div class="mb-3">
                        <label for="post_summary" class="form-label">Small Details</label>
                        <input type="text" value="{{ old('post_summary') }}" name="post_summary" class="form-control">
                        @error('post_summary')  <span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    {{-- Tag Section --}}
                    <section class="tags-cover p-2">
                        <div class="multiple-tag flex flex-wrap h-fit w-fit p-3 rounded-md bg-slate-100" style="gap: 10px; font-weight: bold; font-size: 12px; overflow-y: scroll;">
                            @foreach ($tags as $tag)
                                <p class="myTag bg-green-200 hover:bg-green-300 p-1 rounded-md border-solid border border-green-400 hover:border-green-500 cursor-pointer">{{$tag->tag}}</p>
                            @endforeach
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags</label>
                            <input type="text" value="{{ old('tags') }}" name="tags" class="tagsForm form-control">
                            @error('tags')  <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                    </section>

                    <div class="mb-3 form-check">
                        <label class="form-check-label" for="is_active">Is Active</label>
                        <input type="checkbox" checked value="{{ old('is_active') }}" name="is_active" class="form-check-input">
                        @error('is_active')  <span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    
                    
                </div>
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea placeholder="Describe your Post" name="description" text="sdgsdgs" class="form-control" style="max-height: 200px;">{{ old('description') }}</textarea>
                        @error('description')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>

                    <div class="mb-3">
                        <label for="post_body" class="form-label">post_body/Steps</label>
                        <textarea type="text" placeholder="step 1, step 2," name="post_body" class="form-control">{{ old('post_body') }}</textarea>
                        @error('post_body')  <span class="text-danger">{{$message}}</span>@enderror

                    </div>

                    <div class="md-3">
                        <label for="image">Upload Image</label>
                        <input type="file" name="Post_image" class="form-control">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="post_body" class="form-label">post_body</label>
                        <textarea type="text" value="" name="post_body" class="form-control" id="post_body">{{ old('procedure') }}</textarea>
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
        <script>
            // Add Tags to form
            function getTag(element) {
                const content = $(element).text();

                let currentValue = $('.tagsForm').val();

                let wordsArray = currentValue ? currentValue.split(', ') : [];

                if (!wordsArray.includes(content)) {
                    if (currentValue) {
                        currentValue += ', ';
                    }
                    currentValue += content;
                    $('.tagsForm').val(currentValue);
                }
            }

            const tagsForm = document.querySelector('.tagsForm');
            const multipleTag = document.querySelector('.multiple-tag');

            let value = ''
            multipleTag.addEventListener('click', (e)=>{
                value += `${e.target.textContent}, `;
                tagsForm.value = value;
            })

            tagsForm.addEventListener('input', ()=>{
                tagsForm.value = ''
                console.log(tagsForm.value);
            })

            // $('#post_body').summernote({
            //     placeholder: '1. post_body / steps to cook,',
            //     tabsize: 2,
            //     height: 120,
            //     toolbar: [
            //     ['style', ['']],
            //     ['font', ['bold', 'underline', 'clear']],
            //     ['color', ['']],
            //     ['para', ['ul', 'ol', '']],
            //     ['table', ['']],
            //     ['insert', ['', '', '']],
            //     ['view', ['', '', '']]
            //     ]
            // });



            
            </script>
    </x-slot:scripts>


</x-webapplayout>