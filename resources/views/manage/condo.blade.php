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
                    <a href="/admin/create" class="btn btn-primary">Manage Condominiums</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($condos) > 0)
                    @foreach($condos as $condo)
                        <table class="table table-striped">
                            <tr>
                                <th>{{$condo->name}}</th>
                            </tr>
                        @endforeach
                    @else
                                <p>No posts found</p>
                    @endif
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
