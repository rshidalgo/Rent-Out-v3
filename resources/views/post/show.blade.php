<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Favicons -->
    <link rel="shortcut icon" href="#">
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
</head>

<body>
    @include('inc.navbar')
    <br>
    <br>
    <br>
    <!--============================= BOOKING =============================-->
    <div>
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                {{--  add the foreach here  --}}
                @foreach($images as $image)
                <div class="swiper-slide">
                        <a href="/storage/{{$image->cover_image}}" class="grid image-link">
                            <img src="/storage/{{$image->cover_image}}" class="img-fluid" alt="#" style="width:600px;height:350px;">
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
    </div>
    <!--//END BOOKING -->
    <!--============================= RESERVE A SEAT =============================-->
    <section class="reserve-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>{{$post->title}}</h5>
                    <p><span>₱</span>{{$post->price}}</p>
                    <p class="reserve-description">Posted on {{$post->created_at}} by {{$post->user['name']}}</p>
                </div>
                <div class="col-md-6">
                    <div class="reserve-seat-block">
                        <div class="reserve-btn">
                            <div class="featured-btn-wrap">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END RESERVE A SEAT -->
    <!--============================= BOOKING DETAILS =============================-->
    <section class="light-bg booking-details_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8 responsive-wrap">
                    <div class="booking-checkbox_wrap">
                        <div class="booking-checkbox">
                        <p>{!!$post->condos['description']!!}</p>
                        <br>
                        <p>{!!$post->body!!}</p>

                        </div>

                        <div class="row">
                            @foreach($amenities as $amenity)
                            <div class="col-md-4">
                                <label class="custom-checkbox">
                                    <span class="ti-check-box"></span>
                                    <span class="custom-control-description">{{$amenity->name}}</span>
                                </label> 
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{--  Booking Section  --}}
                    <div class="booking-checkbox_wrap mt-4">
                        <h5>Book Now</h5>
                        <hr>
                        <div class="customer-review_wrap">
                            
                            <div class="customer-content-wrap">
                                {!! Form::open(['action' => 'Email@book','method'=>'GET']) !!}
                                <div class="form-group">
                                    {{Form::label('start', 'Stay Duration')}}
                                    {{Form::select('duration', ['6 Months' => '6 Months', '1 Year' => '1 Year'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('optional', 'Additional Inquiries')}}
                                    {{Form::textarea('optional', '', ['class'=>'form-control','placeholder'=>'(Optional)'])}}     
                                </div>
                                {{Form::hidden('title', $post->title)}}
                                {{Form::hidden('condo', $post->condos['name'])}}
                                {{Form::hidden('propertyS', $post->user['name'])}}
                                {{Form::hidden('propertyE', $post->user['email'])}}
                                {{Form::submit('Submit', ['class'=>'btn btn-primary '])}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="booking-checkbox_wrap mt-4">
                        <h5>Site Visit Request</h5>
                        <hr>
                        <div class="customer-review_wrap">
                            
                            <div class="customer-content-wrap">
                                {!! Form::open(['action' => 'Email@siteVisit','method'=>'GET','enctype' => 'multipart/form-data']) !!}
                                <div class="form-group">
                                    {{Form::label('time', 'Visit Time and Date')}}
                                    {{Form::select('time', ['AM' => 'AM', 'PM' => 'PM'])}}
                                    {{Form::date('date', '', ['class'=>'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('optional', 'Additional Inquiries')}}
                                    {{Form::textarea('optional', '', ['class'=>'form-control','placeholder'=>'(Optional)'])}}
                                </div>
                                {{Form::hidden('title', $post->title)}}
                                {{Form::hidden('condo', $post->condos['name'])}}
                                {{Form::hidden('propertyS', $post->user['name'])}}
                                {{Form::hidden('propertyE', $post->user['email'])}}
                                {{Form::submit('Submit', ['class'=>'btn btn-primary '])}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 responsive-wrap">
                    <div class="contact-info">
                        <img src="/storage/cover_images/{{$post->condos['cover_image']}}" class="img-fluid" alt="#">
                        <div class="address">
                            <span class="icon-location-pin"></span>
                            <p>{{$post->condos['address']}}</p>
                        </div>
                    </div>
                    <div class="follow">
                        <div class="follow-img">
                            <img src="/storage/profile/{{$post->user['profile_picture']}}" class="img-fluid" alt="#" style="width:150px;height:150px;">
                            <h6>{{$post->user['name']}}</h6>
                            <span>Property Specialist</span>
                        </div>
                        <div class="address">
                            <span class="icon-screen-smartphone"></span>
                        <p>(+63) {{$post->user['phone_num']}}</p>
                        </div>
                        <div class="address">
                            <span class="icon-screen-smartphone"></span>
                            <p>(02) {{$post->user['telephone_num']}}</p>
                        </div>
                        <div class="address">
                            <span class="icon-link"></span>
                            <p>{{$post->user['email']}} <br></p>
                        </div>
                        {{-- <ul class="social-counts">
                            <li>
                                <h6>26</h6>
                                <span>Posts</span>
                            </li>
                            <li>
                                <h6>326</h6>
                                <span>Available</span>
                            </li>
                            <li>
                                <h6>326</h6>
                                <span>Sold</span>
                            </li>
                        </ul> --}}

                        <br>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!--//END BOOKING DETAILS -->
    
<!--============================= FOOTER =============================-->
<footer class="main-block dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <p>Copyright &copy; 2018 Listing. All rights reserved | This project is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Rentout.inc</a></p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <ul>
                        <p>Contact us : </p>
                        <li><a href="https://www.facebook.com/"><span class="ti-facebook"></span></a></li>
                        <li><a href="https://twitter.com/"><span class="ti-twitter-alt"></span></a></li>
                        <li><a href="https://www.instagram.com/"><span class="ti-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--//END FOOTER -->




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
