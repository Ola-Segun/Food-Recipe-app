 <x-webapplayout>

    <style>
        .class{
            justify-content: ;
            justify-items: ;
        }
    </style>

    <x-slot:title>
        Upload
    </x-slot>
    <div class="container py-5">


        @if (session('statuses'))
            @foreach (session('statuses') as $status)
                <div class="container alert alert-dismissible fade show alert-{{ $status['type'] }}" role="alert">
                    {{ $status['message'] }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif



        <div class="row">
            <div class="col-md-6 border rounded shadow" style="height:70vh; overflow:scroll;">

                <div class="flex gap-2" style="display:flex; flex-wrap:wrap; justify-content: center; width:100%;">
                    @foreach ($Post_images as $PostImg)
                        {{-- <div class="" style="background-image: url({{ asset($PostImg->Post_images) }})"  style="width: 200px;" class="border rounded-3"></div> --}}
                        <a href="{{ url('/Posts-image/'.$PostImg->id.'/delete') }}" onclick="confirm('Do you want to delete Image?')" style="justify-self: center">
                            <img src="{{ asset($PostImg->Post_images) }}" alt="" style="width: 180px; min-width: 100px;" class="border roundes-3">
                        </a>
                    @endforeach
                </div>

            </div>
            <div class="col-md-6 ">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>
                            <a href="{{ url('/posts/'.$Post->id).'/view' }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <h5>Post Name: {{$Post->Post_name}}</h5>
                        <hr>

                        @if ($errors->any())
                            <ul class="alert alert-warning alert-dismissible">
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        @endif
                        
                        <form action="{{ url('posts/'. $Post->id .'/upload') }}" method="post" enctype="multipart/form-data">
                           
                            @csrf

                            <div class="md-3 py-2">
                                <label for="">Upload images (Max:20)</label>
                                <input type="file" name="Post_images[]" multiple class="form-control" id="">
                            </div>
                        
                            <div class="md-3">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>


</x-webapplayout>

