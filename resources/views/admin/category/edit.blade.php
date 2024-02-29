@extends('admin.dashboard')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Category</h2>
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
  
    <form action="{{ route('admin.category.update',$category->id) }}" method="POST">
        @csrf
        <!-- @method('PUT') -->

        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
            <input type="hidden" name="id" value="{{ $category->id }}">
                <strong>Category Name:</strong>
                <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" placeholder="Category Name">
            </div>
        </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" class="form-control" value="{{ $category->description }}" placeholder="Description">
                </div>
        </div>
       
        <br>
        <br>
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="{{ route('admin.category.table') }}"> Back</a>
            </div>
        </div>
   
    </form>
    @endsection