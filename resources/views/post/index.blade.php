@extends('layouts.app')
<br>
<br>
<!--============================= FEATURED UNITS =============================-->
<section class="main-block light-bg" name='test'>
        @include('inc.messages')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Condominium Units</h3>
                    </div>
                </div>
            </div>
            <div class="container">
{{-- 
                    <form class="form-wrap mt-4" name="search_item" method="get" action="search" id="filter-tables">
                        <div class="row">
                            <div class="col-sm-3">
                                <select name="search_term" class="input-sm form-control" placeholder="Filter">
                                    <option>SMDC</option>
                                    <option>Ayala Corporation</option>
                                    <option>DMCI</option>
                                </select>
                            </div>
                            <button type="submit" class="btn-form"><span class="icon-magnifier search-icon"></span>Filter<i class="pe-7s-angle-right"></i></button>
                        </div>
                    </form> --}}

        {{-- <form class="form-wrap mt-4" name="search_item" method="get" action="search" id="filter-tables" >
            <div class="row">
                                <div class="col-sm-3">
                                    <select class="input-sm form-control" placeholder="Filter">
                                      <option>Avida</option>
                                      <option>Ayala</option>
                                      <option>Century Properties</option>
                                      <option>DMCI</option>
                                    </select>
                                </div>
                            </div> --}}

<br>
        <br>
        <br>
        <br>
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