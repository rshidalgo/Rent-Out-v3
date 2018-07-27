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
                <div class="card-header">Add Condominium</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif                    
                </div>
                <img src="/storage/cover_images/{{$condo->cover_image}}" class="img-fluid" alt="#">                
                <a href="/admin/condos" class="btn btn-primary">Go Back</a>
                {!! Form::open(['action' => ['AdminController@update', $condo->id],'method'=>'POST','enctype' => 'multipart/form-data']) !!}

                {{--  Developer Information  --}}
                {{Form::label('developers', 'Developer')}} 
                {!! Form::select('developers', App\Developer::pluck('name', 'id'), $condo->developer, ['class'=>'form-control']) !!}

                {{--  Condominium Information  --}}

                    <div class="form-group">
                        {{Form::label('name', 'Condominium Name')}} 
                        {{Form::text('name', $condo->name, ['class'=>'form-control','placeholder'=>'Name'])}}
                    </div>

                    <div class="form-group">
                            {{Form::label('address', 'Address')}} 
                            {{Form::text('address', $condo->address, ['class'=>'form-control','placeholder'=>'Building number, Block, Street/Ave, Barangay, City'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('city', 'City')}}
                        {{Form::select('city', [
                            'Manila' => 'Manila', 
                            'Mandaluyong' => 'Mandaluyong', 
                            'Marikina' => 'Marikina',
                            'Pasig' => 'Pasig', 
                            'Quezon City' => 'Quezon City', 
                            'San Juan' => 'San Juan',
                            'Caloocan' => 'Caloocan', 
                            'Malabon' => 'Malabon', 
                            'Navotas' => 'Navotas',
                            'Valenzuela' => 'Valenzuela', 
                            'Las Pinas' => 'Las Pinas', 
                            'Makati' => 'Makati',
                            'Muntinlupa' => 'Muntinlula',
                            'Paranaque' => 'Paranaque',
                            'Pasay' => 'Pasay',
                            'Pateros' => 'Pateros',
                            'Taguig' => 'Taguig'
                            ], $condo->city)}}
                    </div>

                    <div class="form-group">
                            {{Form::label('description', 'Short Description')}} 
                            {{Form::text('description', $condo->description, ['class'=>'form-control','placeholder'=>'Developer'])}}
                    </div>

                    <div id="form-group">
                            {{--  <div class="container">
                                    <div class="row">
                                        <input type="hidden" name="count" value="1" />
                                        <div class="control-group" id="fields">
                                            <label class="control-label" for="field1">Nice Multiple Form Fields</label>
                                            <div class="controls" id="profs"> 
                                                <form class="input-append">
                                                    <div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
                                                </form>
                                            <br>
                                            <small>Press + to add another form field :)</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>  --}}
                            {{Form::label('amenities', 'Add More Condominium Amenities')}} <br>
                           
                            <input autocomplete="off" class="input" id="field1" name="amenities[]" type="text" placeholder="Insert Amenity" data-items="8">

                            <button id="b1" class="btn add-more" type="button">+</button>
                    </div>

                    <div class="form-group">
                        @foreach($condo->amenities as $amenity)
                        {{Form::label('amenity_val', $amenity->name)}}
                        {{ Form::checkbox('amenity[]', $amenity->id, true) }}
                        <br>
                        @endforeach
                    </div>

                    <div class="form-group">
                            {{Form::label('license', 'License no.')}} 
                            {{Form::text('license', $condo->license_no, ['class'=>'form-control','placeholder'=>'ISO XXXXX:XXXX'])}}
                    </div>

                    <div class="form-group">
                            {{Form::label('tin', 'Tax Indentification Number (TIN)')}} 
                            {{Form::text('tin', $condo->tin, ['class'=>'form-control','placeholder'=>'XXXXX-XXXXX'])}}
                    </div>

                {{--  Property Specialist Information  --}}
                <h2>Property Specialist</h2>                

                <div class="form-group">
                        {{Form::label('psname', 'Full Name')}} 
                        {{Form::text('psname', $pspecialist->name, ['class'=>'form-control','placeholder'=>'First Name, Middle Initial, Last Name'])}}
                </div>

                <div class="form-group">
                        {{Form::label('date_of_birth', 'Birthdate')}} 
                        {{Form::date('date_of_birth', $pspecialist->date_of_birth, ['class'=>'form-control','placeholder'=>'First Name, Middle Initial, Last Name'])}}
                </div>

                <div class="form-group">
                        {{Form::label('email', 'Email')}} 
                        {{Form::text('email', $pspecialist->email, ['class'=>'form-control','placeholder'=>'johndoe@gmail.com'])}}
                </div>

                <div class="form-group">
                        {{Form::label('gender', 'Gender')}}
                        {{Form::select('sex', [
                            'male' => 'Male', 
                            'female' => 'Female'
                            ], $pspecialist->gender)}}
                </div>

                <div class="form-group">
                        {{Form::label('mobnum', 'Mobile No.')}} 
                        {{Form::text('mobnum', $pspecialist->phone_num, ['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                        {{Form::label('telnum', 'Telephone No.')}} 
                        {{Form::text('telnum', $pspecialist->telephone_num, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::file('cover_image')}}
                </div>

                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Submit', ['class'=>'btn btn-primary '])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="input" id="field' + next + '" name="amenities[]' + next + '" type="text">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
    

    
});
</script>
@endsection
