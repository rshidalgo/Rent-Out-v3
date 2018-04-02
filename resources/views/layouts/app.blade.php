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
    {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}

       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta name="author" content="Colorlib">
       <meta name="description" content="#">
       <meta name="keywords" content="#">
       <!-- Page Title -->
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="/css/bootstrap.min.css">
       <!-- Google Fonts -->
       <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
       <!-- Simple line Icon -->
       <link rel="stylesheet" href="/css/simple-line-icons.css">
       <!-- Themify Icon -->
       <link rel="stylesheet" href="/css/themify-icons.css">
       <!-- Hover Effects -->
       <link rel="stylesheet" href="/css/set1.css">
       <!-- Swipper Slider -->
        <link rel="stylesheet" href="/css/swiper.min.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="/css/magnific-popup.css">
       <!-- Main CSS -->
       <link rel="stylesheet" href="/css/style.css">
       <!-- Favicons -->
        <link rel="shortcut icon" href="#">

        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <br>
        <br>
        <br>
        @include('inc.messages')
        @yield('content')
    </div>
    
<!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- Magnific popup JS -->
    <script src="/js/jquery.magnific-popup.js"></script>
    <!-- Swipper Slider JS -->
    <script src="/js/swiper.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script>
        if ($('.image-link').length) {
            $('.image-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
        if ($('.image-link2').length) {
            $('.image-link2').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
    </script>
</body>
</html>
