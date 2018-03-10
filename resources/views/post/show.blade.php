@extends('layouts.app')

@section('content')
<a href="/post" class = "btn btn-primary">Go Back</a>
    <h1>{{$post->title}}</h1>
    <div class="row">
            <div class="col-md-4 col=sm=4">
                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
            </div>
        </div>
    <div>
       <h1>Description</h1> 
       {!!$post->body!!}
       <h3>Amenities: {!!str_replace(["[","]","\""],' ',$post->amenities->pluck('name'))!!}</h3>
       <h3>Inclusion: {!!$post->inclusion!!}</h3>
       <h3>Unit Level: {!!$post->unit_level!!}</h3>
       <h3>Unit Type: {!!$post->unit_type!!}</h3>
       
       <h3>City: {!!$post->city!!}</h3>
       <h3>
       <h3>Price: PHP {!!$post->price!!}</h3>



    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user['name']}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/post/{{$post->id}}/edit" class="btn btn-default">Edit</a>

            {!! Form::open(['action' => ['PostController@destroy', $post->id],'method'=>'POST', 'class'=>'pull-right']) !!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection