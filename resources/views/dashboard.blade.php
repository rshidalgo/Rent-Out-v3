@extends('layouts.app')
<br>
<br>

@section('content')
<br>
<br>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard of {{Auth::user()->name}}                    <a href="/post/create" class="btn btn-primary">Create Post</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                @if(Auth::user()->types['id'] == 2)                    <br>

                    {{--  Display Active  --}}

                    <div class="card-header">Active</div>
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                            <table class="table table-striped">
                                @if($post->status == 1)
                                <tr>
                                    <th>{{$post->title}}</th>
                                    <th>
                                    <a href="/post/{{$post->id}}/edit" class="btn btn-info">Edit</a>
                                    </th>
                                    <th>
                                        {!! Form::open(['action' => ['PostController@reserve', $post->id],'method'=>'POST', 'class'=>'pull-right']) !!}
                                        {{ Form::checkbox('checkbox', true) }}      
                                        {{ Form::text('customer', '',['placeholder'=>'Customer Name'])}}                                  
                                        {{Form::submit('Reserved',['class'=>'btn btn-warning'])}}
                                        {!!Form::close()!!}
                                    </th>
                                    <th>
                                        {!! Form::open(['action' => ['PostController@remove', $post->id],'method'=>'POST', 'class'=>'pull-right']) !!}
                                        {{ Form::checkbox('remove', true) }}
                                        {{Form::submit('Remove',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </th>
                                </tr>
                                @endif
                        @endforeach
                    @else
                                <p>No posts found</p>
                    @endif
                            </table>

                    {{--  Display Sold or Inactive Posts  --}}
                    <div class="card-header">Inactive</div>
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                            <table class="table table-striped">
                                @if($post->status == 0)
                                <tr>
                                    <th>{{$post->title}}</th>
                                    <th>
                                    <a href="/post/{{$post->id}}/edit" class="btn btn-info">Edit</a>
                                    </th>
                                    <th>
                                        {{--  <a href={{action('PostController@destroy', $post->id)}} class="btn btn-danger">Delete</a>  --}}
                                        {!! Form::open(['action' => ['PostController@reactivate', $post->id],'method'=>'POST', 'class'=>'pull-right']) !!}
                                        {{ Form::checkbox('checkbox', true) }}
                                        {{Form::submit('Reactivate',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </th>
                                    <th>
                                        {!! Form::open(['action' => ['PostController@remove', $post->id],'method'=>'POST', 'class'=>'pull-right']) !!}
                                        {{ Form::checkbox('remove', true) }}
                                        {{Form::submit('Remove',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </th>
                                </tr>
                                @endif
                        @endforeach
                    @endif
                            </table>
                @endif
                </div>
            </div>    
        </div>
    </div>
</div>

@endsection