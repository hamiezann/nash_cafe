@extends('admin.dashboard')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show User Details</h2>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Name :</strong>
                {{ $customer->name}}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email :</strong>
                {{ $customer-> email}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password :</strong>
                {{ $customer-> password}}
            </div>
        </div>
        <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.customer.index') }}"> Back</a>
        </div>
    </div>
@endsection