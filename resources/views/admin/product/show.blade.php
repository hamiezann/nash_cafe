@extends('admin.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product Details</h2>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name :</strong>
                {{ $product->product_name }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description :</strong>
                {{ $product-> description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price :</strong>
                {{ $product->product_price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image :</strong>
                {{ $product->image}}

                <div class="single-product-img">
                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->product_name }}">
                  

                  
                </div>
            </div>
        </div>
        <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.product.index') }}"> Back</a>
        </div>
    </div>
@endsection