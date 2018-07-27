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
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header">Paid</div>
                    @if(count($users) > 0)
                        @foreach($users as $user)
                        @if($user->condos['status'] == 1)
                            <table class="table table-striped">
                                <tr>
                                    <th>{{$user->name}}</th>
                                    <th>{{$user->condos['name']}}</th>
                                    <th>Current Rents: {{$user->condos['reserved']}}</th>
                                    <th>Total Rents: {{$user->condos['total_reserves']}}</th>

                                    <th>
                                        {!! Form::open(['action' => ['AdminController@user_block', $user->id],'method'=>'GET', 'class'=>'pull-right']) !!}
                                        {{ Form::checkbox('checkbox', true) }}      
                                        {{Form::submit('Block',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </th>
                                </tr>
                            </table>
                        @endif
                        @endforeach

                    <div class="card-header">Unpaid/Block</div>
                        @foreach($users as $user)
                            @if($user->condos['status'] == 0)
                                <table class="table table-striped">
                                    <tr>
                                        <th>{{$user->name}}</th>
                                        <th>{{$user->condos['name']}}</th>
                                        <th>Current Rents: {{$user->condos['reserved']}}</th>
                                        <th>Total Rents: {{$user->condos['total_reserves']}}</th>
                                        <th>
                                            {!! Form::open(['action' => ['AdminController@user_paid', $user->id],'method'=>'GET', 'class'=>'pull-right']) !!}
                                            {{ Form::checkbox('checkbox', true) }}      
                                            {{Form::submit('Paid',['class'=>'btn btn-primary'])}}
                                            {!!Form::close()!!}
                                        </th>
                                    </tr>
                                </table>
                            @endif
                        @endforeach
                    @endif
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
