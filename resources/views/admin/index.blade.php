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
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <a href="/admin/condos" class="btn btn-danger">Manage Condominiums</a>
                <br>
                <a href="/admin/users" class="btn btn-danger">Manage Users</a>


            </div>
        </div>
    </div>
</div>
@endsection
