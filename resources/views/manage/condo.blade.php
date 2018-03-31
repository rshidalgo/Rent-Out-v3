@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <a href="/admin" class="btn btn-primary">Go Back</a>
                <div class="card-header">Dashboard</div>
                    <a href="/admin/create" class="btn btn-primary">Add Condominiums</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="card-header">Active</div>
                @if(count($condos) > 0)
                    @foreach($condos as $condo)
                    @if($condo->status == 1)
                    <table class="table table-striped">
                        <tr>
                            <th>{{$condo->name}}</th>
                            <th>
                            <a href="/admin/{{$condo->id}}/edit" class="btn btn-info">Edit</a>
                            </th>
                            <th>
                                {!! Form::open(['action' => ['AdminController@condo_status', $condo->id],'method'=>'POST', 'class'=>'pull-right']) !!}
                                {{Form::submit('Inactive',['class'=>'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </th>
                            <th></th>
                        </tr>
                    @endif
                    @endforeach
                @else
                            <p>No posts found</p>
                    </table>
                @endif
                <div class="card-header">Inactive</div>
                    @if(count($condos) > 0)
                        @foreach($condos as $condo)
                            <table class="table table-striped">
                                @if($condo->status == 0)
                                <tr>
                                    <th>{{$condo->name}}</th>
                                    <th>
                                    <a href="/post/{{$condo->id}}/edit" class="btn btn-info">Edit</a>
                                    </th>
                                    <th>
                                        {!! Form::open(['action' => ['PostController@destroy', $condo->id],'method'=>'POST', 'class'=>'pull-right']) !!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Reactivate',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </th>
                    
                                </tr>
                                @endif
                        @endforeach
                    @endif
                            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


