<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ URL::asset('js/bootstrap.bundle.min.js') }}"> --}}
    
    <script src="{{ URL::asset('resources\js\jquery-3.7.1.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ 'Socials | ' . $title  }}</title>
</head>
<body class="" style="background-color: rgba(240, 248, 255, 0.426)">

    {{-- Components --}}
    <div class="">

        {{-- Nav bar --}}
        <x-partials.admin-navbar />
        
    
    </div>


    <div class="grid">
        <div class="container grid justify-self-center ">
            
            <div class="main w-full mb-7">
                <div class="inner-head flex justify-between items-center mb-3">
                    <h2 class=" text-3xl">
                        Welcome Admin
                    </h2>
        
                    <div class="page-name">
                        <h2 class=" text-xl">
                            @yield('dynamic-content')
                        </h2>
                    </div>
                </div>
    
                {{-- <br> --}}
                <hr class="mb-3">
                {{-- <br> --}}

                {{-- Content --}}
                {{ $slot }}
                
            </div>
        </div>
    </div>


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>


    {{-- <link rel="stylesheet" href="{{ URL::asset('js/bootstrap.bundle.min.js') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ URL::asset('js/dropzone.js') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/dropzone.min.js') }}">
    <link rel="stylesheet" href="{{ URL::asset('dropzone-main/src/dropzone.js') }}">
    <link rel="stylesheet" href="{{ URL::asset('dropzone-main/tool/dropzone-global.js') }}"> --}}

    {{ $scripts ?? ''}}

</body>
</html>
</body>
</html>