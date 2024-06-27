<x-admin-app-layout>

    <x-slot:title>
        Users
    </x-slot>

    @section('dynamic-content')
        <div class="">
            <span class="underline"><a href="{{ url('posts/admin') }}">Home</a></span>/
            <span class="underline"><a href="{{ url('posts/admin/posts') }}">Tags</a></span>

        </div>
        
    @endsection

    <style>
        .card-over-none::-webkit-scrollbar{
            width: 7px;
            background-color:;
            padding: 0 3px;
        }
        .card-over-none::-webkit-scrollbar-thumb{
            width: 5px;
            background-color: rgb(135, 139, 142);
            border-radius: 10px;
        }
        .card-over-none::-webkit-scrollbar-corner{
            background-color: chartreuse
        }
    </style>

    <div class="cover" style="padding: 0 5%;">
    
        <div class="card-over-none overflow-y-scroll shadow-lg rounded-3xl" style="height: 70vh;">
            <div class=" flex w-full">
                
                
                <div class="tags-container p-5 flex flex-wrap gap-4">

                    <div id="tag-div add-tag" class="tag add-tag bg-orange-400 flex border shadow-sm hover:shadow-md py-1 px-1 rounded-full">                                   
                        <span type="submit" class="tag-btn cursor-pointer">
                            <svg class="w-5 add-svg" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </div>


                        {{-- Display unique tags --}}
                        @foreach ($tags as $tag)
                                <form action="{{ url('/posts/admin/tags/update', ['id' => $tag->id]) }}" method="POST" id="tag-div {{$tag->id}}" class="tag tag-form h-9 flex items-center border shadow-sm hover:shadow-md pr-1 rounded-full">
                                    @csrf

                                    @method('PUT')
                                    <a href="{{ url('/posts/admin/tags/delete', ['id' => $tag->id]) }}" class="delete-tag h-full hover:bg-red-300 bg-red-50" style=" width: 1rem; border-radius: 500px 0 0 500px "></a>
                                    <input type="text" id="{{$tag->id}}" value="{{$tag->tag}}" name="tag" size="" oninput="adjustWidth(this)" class="outline-none tag-input font-semibold border-none p-0 text-center m-0">
                                    <button type="submit" class="tag-btn update-tag  cursor-pointer" id="tag-btn">
                                        <svg class="w-5" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                </form>
                        @endforeach
                        
                    {{-- <form action="{{ url('/posts/admin/tags/create') }}" method="POST" id="tag-div {{$tag->id}}" class="tag tag-form flex items-center border shadow-sm hover:shadow-md py-1 pl-3 pr-1 rounded-full">
                          @csrf          
                        <input type="text" id="{{$tag->id}}" value="" name="tag" size="1" oninput="adjustWidth(this)" class="outline-none tag-input font-semibold border-none p-0 text-center">
                        <button type="submit" class="tag-btn create cursor-pointer" id="tag-btn">
                            <svg class="w-5" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </form> --}}
                </div>
            </div>
        </div>   
    
    </div>

    <script>

        // Get all elements with the ID 'myInput'
        const inputFields = document.querySelectorAll('.tag-input');

        // Loop through each input field
        inputFields.forEach(inputField => {
            // Get the value of the current input field
            const inputValue = inputField.value;

            // Calculate the number of characters in the value
            const charCount = inputValue.length;
            // const smallSize = charCount-4;
            // Set the 'size' attribute of the input field to the number of characters
            inputField.size = charCount-1;
        });


        function adjustWidth(input) {
            // Set the input's width to auto to allow it to shrink
            input.style.width = 'auto';
            
            // Get the width of the input's value plus some padding
            const textWidth = input.scrollWidth + 8; // 8px padding
            
            // Set the input's width to the calculated width
            input.style.width = textWidth + 'px';
        }

        // function deleteTag(){
        //     const delTagBtn = document.querySelector('.delete-tag');
        //     delTagBtn.addEventListener('click', () => {
        //         if(confirm("Do you want to Delete?")){
        //             dedelTagBtn.remove();
        //         }
        //     })
        // }

        document.querySelector('.add-tag').addEventListener('click', function(){

            var html = '';
            html += '<form action="{{ url('/posts/admin/tags/create') }}" method="POST" id="tag-div {{$tag->id}}" class="tag tag-form flex items-center border shadow-sm hover:shadow-md py-1 pl-3 pr-1 rounded-full">';
            html += '@csrf';
            html += '<input type="text" id="{{$tag->id}}" value="" name="tag" size="1" oninput="adjustWidth(this)" class="outline-none tag-input font-semibold border-none p-0 text-center">';
            html += '<button type="submit" class="tag-btn create cursor-pointer" id="tag-btn">';
            html += '<svg class="w-5" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">';
            html += '<path d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" stroke-linecap="round" stroke-linejoin="round"></path>';
            html += '</svg>';
            html += '</button>';
            html += '</form>';

            const new_div = document.createElement('div');
            new_div.innerHTML = html;


            document.querySelector('.tags-container').append(new_div);

        })

            
    </script>

    <script>
    
    
        // $(document).ready(function(){

        //     // Creating Tag field
        //     // $('.add-tag').on('click', function(){

        //     //     var html = '';
        //     //     html += '<form action="{{ url('/posts/admin/tags/create') }}" method="POST" id="tag-div {{$tag->id}}" class="tag tag-form flex items-center border shadow-sm hover:shadow-md py-1 pl-3 pr-1 rounded-full">';
        //     //     html += '@csrf';
        //     //     html += '<input type="text" id="{{$tag->id}}" value="" name="tag" size="1" oninput="adjustWidth(this)" class="outline-none tag-input font-semibold border-none p-0 text-center">';
        //     //     html += '<button type="submit" class="tag-btn create cursor-pointer" id="tag-btn">';
        //     //     html += '<svg class="w-5" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">';
        //     //     html += '<path d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" stroke-linecap="round" stroke-linejoin="round"></path>';
        //     //     html += '</svg>';
        //     //     html += '</button>';
        //     //     html += '</form>';
                
        //     //     $('.tags-container').append(html);


        //     // })

        //     // create Tag field
        //     // $('.tag-btn').on('click', function(event){
        //     //     const cover = $(this).parent();
        //     //     const tag = cover.find('.tag-input').val();

        //     //     // console.log(tag);
        //     //     url: '{{ route('tags.store') }}',
        //     //     $.ajax({
        //     //         method: 'POST',
        //     //         data: {
        //     //             tag: tag
        //     //         },
        //     //         dataType: 'json',
        //     //         success: function(response) {
        //     //             if (response.success) {
        //     //                 console.log(response.message); // Tag created successfully
        //     //             } else {
        //     //                 console.error(response.message); // Failed to create tag
        //     //             }
        //     //         },
        //     //         error: function(xhr, status, error) {
        //     //             console.error("AJAX request failed:", error);
        //     //         }
        //     //     });
        //     // })



        //     // Updating Tag
        //     // $('.update-tag').on('click', function(event){
        //     //     const cover = $(this).parent();
        //     //     console.log(cover.find('.tag-input').attr('id'));


        //     //     // jQuery.ajax({
        //     //     //     url:"{{url('/posts/admin/tags')}}",
        //     //     //     data:jQuery(this).serialize(),
        //     //     //     type:post,

        //     //     //     success:

        //     //     // })
        //     // })


        //     // $(".tag-form").on("submit", function(event) {
        //     //     event.preventDefault();
        //     //     // var error_ele = document.getElementsByClassName('err-msg');
        //     //     // if (error_ele.length > 0) {
        //     //     //     for (var i=error_ele.length-1;i>=0;i--){
        //     //     //         error_ele[i].remove();
        //     //     //     }
        //     //     // }
            
        //     //     $.ajaxSetup({
        //     //         headers: {
        //     //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        //     //         }
        //     //     });
            
        //     //     $.ajax({
        //     //         url: "{{ route('tags.store') }}",
        //     //         type: "POST",
        //     //         data: new FormData(this),
        //     //         dataType: 'json',
        //     //         contentType: false,
        //     //         processData: false,
        //     //         cache: false,
        //     //         beforeSend: function() {
        //     //             $("#tag-btn").prop('disabled', true);
        //     //         },
        //     //         success: function(data) {
        //     //             if (data.success) {
        //     //                 // $("#frmAppl")[0].reset();
        //     //                 // $("#showMsg").modal('show');

        //     //                 confirm('Success...');
                            
        //     //             } 
        //     //             // else {
        //     //             //     $.each(data.error, function(key, value) {
        //     //             //         var el = $(document).find('[name="'+key + '"]');
        //     //             //         el.after($('<span class= "err-msg">' + value[0] + '</span>'));
                                
        //     //             //     });
        //     //             // }
        //     //             $("#tag-btn").prop('disabled', false);
        //     //         },
        //     //         // error: function (err) {
        //     //             // $("#message").html("Some Error Occurred!")
        //     //             // }
        //     //     });
        //     // });

        // });

    
    </script>

</x-admin-app-layout>