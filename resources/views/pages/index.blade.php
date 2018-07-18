@extends('layouts.app')
<br>
<br>
<section class="slider d-flex align-items-center">
        <!-- <img src="images/slider.jpg" class="img-fluid" alt="#"> -->
        {{-- @include('inc.messages') --}}
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap">
                                    <h1>Condominiums within reach</h1>
                                    <h5>Let's uncover the best condominium units nearest to you.</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <form class="form-wrap mt-4" method="GET" action="search">
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
@yield('test')
<!--============================= FEATURED PLACES =============================-->

<section class="main-block light-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="styled-heading">
                    <h3>Featured Units</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    @if($post->status == 1 && $post->condos['status'] == 1)
                        <div class="col-md-4 featured-responsive">
                            <div class="featured-place-wrap">
                                <a href="/post/{{$post->id}}">
                                    <img src="/storage/cover_images/{{$post->condos['cover_image']}}" class="img-fluid" alt="#" style="width:400px;height:300px;">

                                    <div class="featured-title-box">
                                        <h6>{{$post->title}}</h6>
                                        <p>{!!str_replace(["[","]","\""],' ',$post->condos()->pluck('name'))!!} </p> <span>• </span>
                                        <p><span>₱</span>{{$post->price}}</p>
                                        <ul>
                                            <li><span class="icon-location-pin"></span>
                                                <p style="text-transform: capitalize;">City: {!!str_replace(["[","]","\""],' ',$post->condos()->pluck('city'))!!}</p>
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
                    @endif
                @endforeach
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="featured-btn-wrap">
                    <a href="/post" class="btn btn-danger">VIEW ALL</a>
                </div>
            </div>
        </div>
    </div>
</section>

    <!--============================= REAL ESTATE DEVELOPERS =============================-->
    <section class="main-block light-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="styled-heading">
                        <h3>Real Estate Developers</h3>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-3 category-responsive">
                <div class="featured-place-wrap">
                    <a href="/services">
                        <img src="/storage/developers/avida.png" class="img-fluid" alt="#" style="width:600px;height:100px;">
                    </a>
                </div>
            </div>
            <div class="col-md-3 category-responsive">
                <div class="featured-place-wrap">
                    <a href="/services">
                        <img src="/storage/developers/ayala.JPG" class="img-fluid" alt="#" style="width:800px;height:100px;">
                    </a>
                </div>
            </div>
            <div class="col-md-3 category-responsive">
                <div class="featured-place-wrap">
                    <a href="/services">
                        <img src="/storage/developers/century.png" class="img-fluid" alt="#" style="width:800px;height:100px;">
                        {{--  add rating data here  --}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!--//END CATEGORIES -->

<!--============================= ABOUT =============================-->
<section class="main-block light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="add-listing-wrap">
                        <h2>About</h2>
                        <p style="text-align:justify">The purpose of the Rentout web application is to alleviate the issues or pain points 
                            determined and verified by the respondents on the first survey. This does not only address 
                            the pain points but, this will also bring in enhanced user experience.  
                 
                            The Rentout web application is a cool and easy way to search and advertise condominium 
                            units. By using the GPS technology, the searching methods has been taken up to a whole new 
                            level; displaying search results within x kilometer radius.</p>
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