<x-admin-app-layout>

    <x-slot:title>
        Users
    </x-slot>

    @section('dynamic-content')
        <div class="">
            <span class="underline"><a href="{{ url('posts/admin') }}">Home</a></span>/
            <span class="underline"><a href="{{ url('posts/admin/posts') }}">Gallery</a></span>

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
    
        <div class="card-over-none overflow-y-scroll shadow-lg rounded-3xl" style="height: 73vh;">
            <div class=" flex w-full flex-wrap">
                @foreach ($galleries as $gallery)

                    {{-- <style>
                        .view:checked ~ .img-show{
                            left: 35%; 
                            top: 30%;
                            min-width: 500px;
                            max-width: 500px;
                            height: fit-content;
                            background-size: cover;
                            opacity: 1;
                        }
                    </style> --}}
                    
                    <div class="img-cover" style="background-image: url({{ asset($gallery->image) }});">
                        <!-- <img src="productimages/64e1d6ac46fdd.jpg" alt=""> -->
                        <div class="details">
                            <div class="img-btn img-view  cursor-pointer" onclick="addShow(this)">
                                <svg class=" w-7" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.5 3.75H6A2.25 2.25 0 0 0 3.75 6v1.5M16.5 3.75H18A2.25 2.25 0 0 1 20.25 6v1.5m0 9V18A2.25 2.25 0 0 1 18 20.25h-1.5m-9 0H6A2.25 2.25 0 0 1 3.75 18v-1.5M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>

                            <a href="{{url('posts/admin/gallery/delete',  ['id' => $gallery->id]) }}" onclick="confirm('Do you want to Delete?')" class="img-btn img-delete cursor-pointer">
                                <svg class=" w-7" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>  

                    {{-- <div class="img-show shadow-md absolute object-center bg-gray-100">
                        <img src="url({{ asset($gallery->image) }});" alt="">
                    </div> --}}
                @endforeach
            </div>
        </div>   
    </div>

    <script>
        
        // const imageFrame = document.getElementsByClassName('.img-view');
        // const imgShow = document.getElementsByClassName('.img-show');

        // function addShow(element){
        //     // imageFrame.addEventListener('click', ()=>{
        //         if(imgShow.classList.contains('show')){
        //             imgShow.classList.remove('show');
        //         }else{
        //             imgShow.classList.add('show');
        //         }
        //     // })
        // }

    </script>
</x-admin-app-layout>