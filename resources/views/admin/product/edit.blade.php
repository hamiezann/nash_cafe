@extends('admin.dashboard')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
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
  
    <form action="{{ route('admin.product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- @method('PUT') -->

        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
            <input type="hidden" name="id" value="{{ $product->id }}">
                <strong>Product Name:</strong>
                <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" placeholder="Product Name">
            </div>
        </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" class="form-control" value="{{ $product->description }}" placeholder="Description">
                </div>
        </div>
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
            <input type="hidden" name="id" value="{{ $product->id }}">
                <strong>Product Price:</strong>
                <input type="text" name="product_price" value="{{ $product->product_price }}" class="form-control" placeholder="Product Price">
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
            <input type="hidden" name="id" value="{{ $product->id }}">
                <strong>Image:</strong>
              
                <input type="file" class="form-control" name="image" placeholder="Image">
            </div>
        </div>
        </div>
        <!-- <div class="row">

        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
            <input type="hidden" name="id" value="{{ $product->id }}">
                <strong>Category Id:</strong>
                <input type="text" name="category_id" value="{{ $product->category_id }}" class="form-control" placeholder="Category Id">
            </div>
        </div>
        </div> -->
        <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-12">
        <div class="form-group">
            <strong>Category:</strong>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

        <br>
        <br>
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="{{ route('admin.product.index') }}"> Back</a>
            </div>
        </div>
   
    </form>
    @endsection