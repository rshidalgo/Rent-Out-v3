@extends('layouts.app')
<br>
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
                <div class="card-header">Manage Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif                    
                </div>
                <div class="follow-img">
                <img src="/storage/profile/{{$user->profile_picture}}" class="img-fluid" alt="#" style="width:150px;height:150px;">       
                </div>         
                <a href="/" class="btn btn-primary">Go Back</a>
                {!! Form::open(['action' => ['UserController@update', $user->id],'method'=>'POST','enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                        {{Form::label('psname', 'Full Name')}} 
                        {{Form::text('psname', $user->name, ['class'=>'form-control','placeholder'=>'First Name, Middle Initial, Last Name'])}}
                </div>

                <div class="form-group">
                        {{Form::label('email', 'Email')}} 
                        {{Form::text('email', $user->email, ['class'=>'form-control','placeholder'=>'johndoe@gmail.com'])}}
                </div>

                <div class="form-group">
                        {{Form::label('mobnum', 'Mobile No.')}} 
                        {{Form::text('mobnum', $user->phone_num, ['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                        {{Form::label('telnum', 'Telephone No.')}} 
                        {{Form::text('telnum', $user->telephone_num, ['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::file('profile_picture')}}
                </div>

                {{Form::submit('Submit', ['class'=>'btn btn-primary '])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
