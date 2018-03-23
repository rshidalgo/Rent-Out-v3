@extends('layouts.app')
<!--============================= FEATURED PLACES =============================-->
<section class="main-block light-bg">
        <br>
        <br>
        <br>
        <br>
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
        </div>
</section>
    