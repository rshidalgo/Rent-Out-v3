@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<br>
<h1>Create Post for {{Auth::user()->condos['name']}}</h1>
    {!! Form::open(['action' => 'PostController@store','method'=>'POST','enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}} 
            {{Form::text('title', '', ['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('body', 'Description')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class'=>'form-control','placeholder'=>'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('amenities', 'Gym')}}
            {{Form::checkbox('amenities[]', 1)}}
            {{Form::label('amenities', 'Swimming Pool')}}
            {{Form::checkbox('amenities[]', 2)}}
        </div>
        <div class="form-group">
            {{Form::label('inclusion', 'Inclusion')}}
            {{Form::select('inclusion', ['Fully-Furnished' => 'Fully-Furnished', 'Semi-Furnished' => 'Semi-Furnished', 'Unfurnished' => 'Unfurnished'], 'Semi-Furnished')}}
        </div>
        <div class="form-group">
            {{Form::label('unit_level', 'Unit Level')}}
            {{Form::select('unit_level', ['High Rise' => 'High Rise', 'MR' => 'Mid Rise', 'Low Rise' => 'Low Rise'], 'High Rise')}}
        </div>
        <div class="form-group">
            {{Form::label('unit_type', 'Unit Type')}}
            {{Form::select('unit_type', ['Studio' => 'Studio', 'Single Bedroom' => 'Single Bedroom', 'Dual Bedroom' => 'Dual Bedroom'], 'Studio')}}
        </div>
        <div class="form-group">
            {{Form::label('city', 'City')}}
            {{Form::select('city', [
                'manila' => 'Manila', 
                'mandaluyong' => 'Mandaluyong', 
                'marikina' => 'Marikina',
                'pasig' => 'Manila', 
                'quezon_city' => 'Quezon City', 
                'san_juan' => 'San Juan',
                'caloocan' => 'Caloocan', 
                'malabon' => 'Malabon', 
                'navotas' => 'Navotas',
                'valenzuela' => 'Valenzuela', 
                'las_pinas' => 'Las Pinas', 
                'makati' => 'Makati',
                'muntinlupa' => 'Muntinlula',
                'paranaque' => 'Paranaque',
                'pasay' => 'Pasay',
                'pateros' => 'Pateros',
                'taguig' => 'Taguig'
                ], 'makati')}}
        </div>
        <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::text('price', '', ['class'=>'form-control','placeholder'=>'0.0'])}}
        </div>
        <div class="form-group">
            {{Form::label('sale_price', 'Promo Price')}}
            {{Form::text('sale_price', '', ['class'=>'form-control','placeholder'=>'0.0'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
    {{Form::submit('Submit', ['class'=>'btn btn-primary '])}}
    {!! Form::close() !!}
@endsection