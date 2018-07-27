@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Create Post for {{Auth::user()->condos['name']}}</div>
                    {!! Form::open(['action' => 'PostController@store','method'=>'POST','enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {{Form::text('title', '', ['class'=>'form-control','placeholder'=>'Title'])}}
                        </div>
                        <div class="form-group">
                                {!! Form::label('body', 'Description') !!}
                                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class'=>'form-control','placeholder'=>'Description'])}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('inclusion', 'Inclusion') !!}
                            {{Form::select('inclusion', ['Fully-Furnished' => 'Fully-Furnished', 'Semi-Furnished' => 'Semi-Furnished', 'Unfurnished' => 'Unfurnished'], 'Semi-Furnished')}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('unit_level', 'Unit Level') !!}
                            {{Form::select('unit_level', ['High Rise' => 'High Rise', 'MR' => 'Mid Rise', 'Low Rise' => 'Low Rise'], 'High Rise')}}
                        </div>
                        <div class="form-group">
                            {{Form::label('unit_type', 'Unit Type')}}
                            {{Form::select('unit_type', ['Studio' => 'Studio', 'Single Bedroom' => 'Single Bedroom', 'Dual Bedroom' => 'Dual Bedroom'], 'Studio')}}
                        </div>
                        
                        <div class="form-group">
                            {{Form::label('price', 'Price')}}
                            {{Form::number('price', '', ['class'=>'form-control','placeholder'=>'0.0'])}}
                        </div>
                        {{--  <div class="form-group">
                            {{Form::label('sale_price', 'Promo Price')}}
                            {{Form::text('sale_price', '', ['class'=>'form-control','placeholder'=>'0.0'])}}
                        </div>  --}}
                        <div class="form-group">
                            <input type="file" name="cover_image[]" multiple>
                            <br>
                            <span style="color:#cccccc;text-align:center;">Minimum 3 Pictures Upload</span>
                        </div>
                    {{Form::submit('Submit', ['class'=>'btn btn-primary '])}}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection