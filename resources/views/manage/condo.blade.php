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
                @if(count($condos_active) > 0)
                    @foreach($condos_active as $condo)
                    <table class="table table-striped">
                        <tr>
                            <th>{{$condo->name}}</th>
                            <th>
                            <a href="/admin/{{$condo->id}}/edit" class="btn btn-info">Edit</a>
                            </th>
                            <th>
                                {!! Form::open(['action' => ['AdminController@condo_inactive', $condo->id],'method'=>'POST', 'class'=>'pull-right']) !!}
                                {{ Form::checkbox('checkbox', true) }}      
                                {{Form::submit('Inactive',['class'=>'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </th>
                            <th></th>
                        </tr>
                    </table>
                    @endforeach
                @endif
                <div class="card-header">Inactive</div>
                    @if(count($condos_inactive) > 0)
                        @foreach($condos_inactive as $condo)
                            <table class="table table-striped">
                                <tr>
                                    <th>{{$condo->name}}</th>
                                    <th>
                                    <a href="/post/{{$condo->id}}/edit" class="btn btn-info">Edit</a>
                                    </th>
                                    <th>
                                        {!! Form::open(['action' => ['AdminController@condo_active', $condo->id],'method'=>'POST', 'class'=>'pull-right']) !!}
                                        {{ Form::checkbox('checkbox', true) }}      
                                        {{Form::submit('Reactivate',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </th>
                    
                                </tr>
                            </table>
                        @endforeach
                    @endif
                            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


