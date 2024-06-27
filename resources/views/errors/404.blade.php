<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

    <title>404</title>
</head>
<body class="bg-dark d-flex align-items-center justify-content-center min-vh-100">

    <div class="container">
        <div class="p-5 m-5 text-center">
            <div class="card p-5 rounded-5">
                <h1 class="display-1 fw-bold">404</h1>
                <h4 class="display-6">Page Not Found</h4>
                <hr>
                <p class="lead fw-normal">Hey, the page you are trying to find is not Available.</p>
                <div class=""><a href="{{ url('/') }}" class="btn btn-primary rounded-5 px-5">Go Back home</a></div>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>


    <link rel="stylesheet" href="{{ URL::asset('js/bootstrap.bundle.min.js') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/dropzone.js') }}">
    <link rel="stylesheet" href="{{ URL::asset('dropzone-main/src/dropzone.js') }}">
</body>
</html>