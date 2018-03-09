<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta name="author" content="Colorlib">
       <meta name="description" content="#">
       <meta name="keywords" content="#">
       <!-- Page Title -->
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="css/bootstrap.min.css">
       <!-- Google Fonts -->
       <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
       <!-- Simple line Icon -->
       <link rel="stylesheet" href="css/simple-line-icons.css">
       <!-- Themify Icon -->
       <link rel="stylesheet" href="css/themify-icons.css">
       <!-- Hover Effects -->
       <link rel="stylesheet" href="css/set1.css">
       <!-- Main CSS -->
       <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="app">
        <div class="container">
            @include('inc.navbar')
        </div>
        <br>
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
