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

                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="featured-btn-wrap">
                                    <a href="/admin/condos" class="btn btn-danger">Manage Condominium Units</a>
                                </div>
                                <br>
                                <div class="featured-btn-wrap">
                                    <a href="/admin/users" class="btn btn-danger">Manage Property Specialists</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
