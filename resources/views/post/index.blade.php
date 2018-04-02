@extends('layouts.app')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="search-filter.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<!--============================= FEATURED PLACES =============================-->
<section class="main-block light-bg" name='test'>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Featured Units</h3>
                    </div>
                </div>
            </div>
            <div class="container">
        <form class="form-wrap mt-4" name="search_item" method="get" action="search" id="filter-tables" >
            <div class="row">
                                <div class="col-sm-3">
                                    <select class="input-sm form-control" placeholder="Filter">
                                      <option>Avida</option>
                                      <option>Ayala</option>
                                      <option>Century Properties</option>
                                      <option>DMCI</option>
                                      <option>File Name 5</option>
                                    </select>
                                </div>
                            </div>

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
                                        <img src="/storage/cover_images/{{$post->condos['cover_image']}}" class="img-fluid" alt="#">
                                        {{--  add rating data here  --}}
                                    <span class="featured-rating-orange">{!!str_replace(["[","]","\""],' ',$post->condos()->pluck('ratings'))!!}</span>
                                        {{--  add rating data here  --}}
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