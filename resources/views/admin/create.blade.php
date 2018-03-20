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
                <div class="card-header">Add Condominium</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif                    
                </div>
                <a href="/admin/condos" class="btn btn-primary">Go Back</a>
                {!! Form::open(['action' => 'AdminController@store','method'=>'POST','enctype' => 'multipart/form-data']) !!}

                {{--  Developer Information  --}}
                {{Form::label('developers', 'Developer')}} 
                {!! Form::select('developers', App\Developer::pluck('name', 'id'), null, ['class'=>'form-control']) !!}

                {{--  Condominium Information  --}}

                    <div class="form-group">
                        {{Form::label('name', 'Condominium Name')}} 
                        {{Form::text('name', '', ['class'=>'form-control','placeholder'=>'Name'])}}
                    </div>

                    <div class="form-group">
                            {{Form::label('address', 'Address')}} 
                            {{Form::text('address', '', ['class'=>'form-control','placeholder'=>'Building number, Block, Street/Ave, Barangay, City'])}}
                    </div>

                    <div class="form-group">
                            {{Form::label('description', 'Short Description')}} 
                            {{Form::text('description', '', ['class'=>'form-control','placeholder'=>'Developer'])}}
                    </div>

                    <div class="form-group">
                            {{Form::label('license', 'License no.')}} 
                            {{Form::text('license', '', ['class'=>'form-control','placeholder'=>'ISO XXXXX:XXXX'])}}
                    </div>

                    <div class="form-group">
                            {{Form::label('tin', 'Tax Indentification Number (TIN)')}} 
                            {{Form::text('tin', '', ['class'=>'form-control','placeholder'=>'XXXXX-XXXXX'])}}
                    </div>

                {{--  Property Specialist Information  --}}
                {{Form::label('ps', 'Property Specialist Information')}} 
                

                <div class="form-group">
                        {{Form::label('psname', 'Full Name')}} 
                        {{Form::text('psname', '', ['class'=>'form-control','placeholder'=>'First Name, Middle Initial, Last Name'])}}
                </div>

                <div class="form-group">
                        {{Form::label('date_of_birth', 'Birthdate')}} 
                        {{Form::date('date_of_birth', '', ['class'=>'form-control','placeholder'=>'First Name, Middle Initial, Last Name'])}}
                </div>

                <div class="form-group">
                        {{Form::label('email', 'Email')}} 
                        {{Form::text('email', '', ['class'=>'form-control','placeholder'=>'johndoe@gmail.com'])}}
                </div>

                <div class="form-group">
                        {{Form::label('sex', 'Sex')}}
                        {{Form::select('sex', [
                            'male' => 'Male', 
                            'female' => 'Female'
                            ], 'male')}}
                </div>

                <div class="form-group">
                        {{Form::label('mobnum', 'Mobile No.')}} 
                        {{Form::text('mobnum', '', ['class'=>'form-control','placeholder'=>'+63 932-842-7121'])}}
                </div>

                <div class="form-group">
                        {{Form::label('telnum', 'Telephone No.')}} 
                        {{Form::text('telnum', '', ['class'=>'form-control','placeholder'=>'(02) 881-0240'])}}
                </div>

                {{Form::submit('Submit', ['class'=>'btn btn-primary '])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
