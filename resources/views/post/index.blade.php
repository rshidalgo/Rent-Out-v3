@extends('layouts.app')

@section('content')
    <h1>Post</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col=sm=4">
                    <a href="/post/{{$post->id}}">
                        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                        <h3>{{$post->title}}</h3>
                    </a>
                    </div>
                </div>
                
                <small>Written on {{$post->created_at}} by {{$post->user['name']}}</small>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
            <p>No posts found</p>
    @endif
@endsection