<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    {{-- <link rel="stylesheet" href=""> --}}

    {{-- @stack('styles')
    @stack('scripts') --}}

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dropzone-main/src/dropzone.scss') }}">

    <title>{{ 'Recipies | ' . $title  }}</title>
</head>
<body>

    {{-- Components --}}
    <div class="container">

        {{-- Nav bar --}}
        <x-partials.navbar />
        
    
    </div>


    {{-- Content --}}
    <div class="container">
        {{ $slot }}
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>


    <link rel="stylesheet" href="{{ URL::asset('js/bootstrap.bundle.min.js') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/dropzone.js') }}">
    <link rel="stylesheet" href="{{ URL::asset('dropzone-main/src/dropzone.js') }}">

    {{ $scripts ?? ''}}

    <script>
        
    </script>
</body>
</html>