@extends('layouts.app')

<section class="slider d-flex align-items-center">
        <!-- <img src="images/slider.jpg" class="img-fluid" alt="#"> -->
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap">
                                    <h1>Discover great places in Philippines</h1>
                                    <h5>Let's uncover the best condominium units nearest to you.</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <form class="form-wrap mt-4" method="GET" action="/search">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <input name="search_term" type="text" placeholder="  What are your looking for?" class="btn-group">
                                    <button type="submit" class="btn-form"><span class="icon-magnifier search-icon"></span>SEARCH<i class="pe-7s-angle-right"></i></button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!--============================= FEATURED PLACES =============================-->
<section class="main-block light-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="styled-heading">
                    <h3>Featured Places</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="col-md-4 featured-responsive">
                        <div class="featured-place-wrap">
                            <a href="/post/{{$post->id}}">
                                <img src="/storage/cover_images/{{$post->cover_image}}" class="img-fluid" alt="#">
                                {{--  add rating data here  --}}
                            <span class="featured-rating-orange">{!!str_replace(["[","]","\""],' ',$post->condos()->pluck('ratings'))!!}</span>
                                {{--  add rating data here  --}}
                                <div class="featured-title-box">
                                    <h6>{{$post->title}}</h6>
                                    <p>{!!str_replace(["[","]","\""],' ',$post->condos()->pluck('name'))!!} </p> <span>• </span>
                                    <p>3 Reviews</p> <span> • </span>
                                    <p><span>$$$</span>$$</p>
                                    <ul>
                                        <li><span class="icon-location-pin"></span>
                                        <p>City: {{$post->city}}</p>
                                        </li>
                                        <li><span class="icon-screen-smartphone"></span>
                                            <p>Inclusion: {{$post->inclusion}}</p>
                                        </li>
                                        <li><span class="icon-link"></span>
                                            <p>Price: {{$post->price}}</p>
                                        </li>

                                    </ul>
                                    <div class="bottom-icons">
                                        <div class="open-now">Sale!</div>
                                        <span class="ti-heart"></span>
                                        <span class="ti-bookmark"></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="featured-btn-wrap">
                    <a href="#" class="btn btn-danger">VIEW ALL</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================= ADD LISTING =============================-->
<section class="main-block light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="add-listing-wrap">
                        <h2>Reach millions of People</h2>
                        <p>Add your Business infront of millions and earn 3x profits from our listing</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="#" class="btn btn-danger"><span class="ti-plus"></span> ADD LISTING</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                            <li><a href="#"><span class="ti-facebook"></span></a></li>
                            <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                            <li><a href="#"><span class="ti-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!--//END FOOTER -->