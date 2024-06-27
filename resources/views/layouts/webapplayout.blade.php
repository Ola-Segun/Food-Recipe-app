<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    <script src="{{ URL::asset('resources\js\jquery-3.7.1.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{ URL::asset('dropzone-main/src/dropzone.scss') }}">
    <link rel="stylesheet" href="{{ URL::asset('dropzone-main/src/basic.scss') }}">

    <title>{{ 'Socials | ' . $title  }}</title>
</head>
<body class="">

    {{-- Components --}}
    <div class="">

        {{-- Nav bar --}}
        <x-partials.navbar />
        
    
    </div>

    {{-- Content --}}
    <div class="flex justify-center items-center mx-8 pt-14 ">
        {{ $slot }}
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>


    {{-- <link rel="stylesheet" href="{{ URL::asset('js/bootstrap.bundle.min.js') }}"> --}}
    <link rel="stylesheet" href="{{ URL::asset('js/dropzone.js') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/dropzone.min.js') }}">
    {{-- <link rel="stylesheet" href="{{ URL::asset('dropzone-main/src/dropzone.js') }}">
    <link rel="stylesheet" href="{{ URL::asset('dropzone-main/tool/dropzone-global.js') }}"> --}}
    <link rel="stylesheet" href="{{ URL::asset('js/jquery.js') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/jquery.min.js') }}">

    {{ $scripts ?? ''}}

    <script>

        // $(document).ready(function(){
        //     $('.container').on('click', function(){
        //         console.log('Container Listening...')
        //     })
        // })


    </script>
</body>
</html>