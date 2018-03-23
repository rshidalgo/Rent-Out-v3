@extends('layouts.app')
<body>
    @include('inc.navbar')
    <!--============================= BOOKING =============================-->
    <div>
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <a href="/storage/developers/avida1.jpg" class="grid image-link">
                        <img src="/storage/developers/avida.png" class="img-fluid" alt="#">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="/storage/developers/ayala.png" class="grid image-link">
                        <img src="/storage/developers/ayala.png" class="img-fluid" alt="#">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="/storage/developers/century1.png" class="grid image-link">
                        <img src="/storage/developers/century.png" class="img-fluid" alt="#">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="/storage/developers/dmci1.png" class="grid image-link">
                        <img src="/storage/developers/dmci1.png" class="img-fluid" alt="#">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="/images/reserve-slide2.jpg" class="grid image-link">
                        <img src="/images/reserve-slide2.jpg" class="img-fluid" alt="#">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="/images/reserve-slide3.jpg" class="grid image-link">
                        <img src="/images/reserve-slide3.jpg" class="img-fluid" alt="#">
                    </a>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
    </div>
    <!--//END BOOKING -->

@section('content')
<h1>{{$title}}</h1>
<p align="center">The purpose of the Rentout web application is to alleviate the issues or pain points 
determined and verified by the respondents on the first survey. This does not only address 
the pain points but, this will also bring in enhanced user experience.  
 
The Rentout web application is a cool and easy way to search and advertise condominium 
units. By using the GPS technology, the searching methods has been taken up to a whole new 
level; displaying search results within x kilometer radius. </p>
@endsection