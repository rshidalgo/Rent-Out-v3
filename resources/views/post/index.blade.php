@extends('layouts.app')
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="search-filter.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
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
                        <h3>Featured Units</h3>
                    </div>
                </div>
            </div>
            <div class="container">
            <div class="row d-flex justify-content-center">
  <div class="row searchFilter" >
     <div class="col-sm-10" >
     <form class="form-wrap mt-4" method="GET" action="search">
     <div class="btn-group" role="group" aria-label="Basic example">
       <input name="search_term" type="text" placeholder="Search" class="btn-group">
       <div class="input-group-btn" >
       <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><span class="label-icon" >Category</span> <span class="caret" >&nbsp;</span><i class="pe-7s-angle-right"></i></button>
        <div class="dropdown-menu dropdown-menu-right" >
           <ul class="category_filters" >
            <li >
             <input class="cat_type category-input" data-label="All" id="all" value="" name="radios" type="radio" ><label for="all" >All</label>
            </li>
            <li >
             <input type="radio" name="radios" id="Avida" value="Avida" ><label class="category-label" for="Avida" >Avida</label>
            </li>
            <li >
             <input type="radio" name="radios" id="Ayala" value="Ayala" ><label class="category-label" for="Ayala" >Ayala</label>
            </li>
            <li >
             <input type="radio" name="radios" id="Century" value="Century" ><label class="category-label" for="Century" >Century Properties</label>
            </li>
            <li >
             <input type="radio" name="radios" id="DMCI" value="DMCI" ><label class="category-label" for="DMCI" >DMCI</label>
            </li>
            <li >
             <input type="radio" name="radios" id="Support" value="Support" ><label class="category-label" for="Support" >Support</label>
            </li>
           </ul>
        </div>
        <button id="searchBtn" type="button" class="btn btn-secondary btn-search" ><span class="glyphicon glyphicon-search" >&nbsp;</span> <span class="label-icon" >Search</span></button>
       </div>
      </div>
     </div>
     </form>
  </div>
</div>
<br>
        <br>
        <br>
        <br>
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
    