@extends('admin.dashboard')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Products</h2>
        </div>
       
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
                <strong> Product Name:</strong>
                <input type="text" name="product_name" class="form-control" placeholder="Product Name">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" class="form-control" name="description" placeholder="Description">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="text" class="form-control" name="product_price" placeholder="Price">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" class="form-control" name="image" placeholder="Image">

            </div>
        </div>
        <!-- <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
                <strong>Category ID:</strong>
              
                <input type="number" class="form-control" name="category_id"  placeholder="Category">
               
            </div>
        </div> -->

        <div class="col-xs-6 col-sm-6 col-md-12">
    <div class="form-group">
        <strong>Category:</strong>
        <select class="form-control" name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>
</div>

        
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        
                <a class="btn btn-primary" href="{{ route('admin.product.index') }}"> Back</a>
        </div>
    </div>
   
</form>
@endsection