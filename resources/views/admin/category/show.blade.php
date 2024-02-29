@extends('admin.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Category Details</h2>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category Name :</strong>
                {{ $category->category_name }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description :</strong>
                {{ $category-> description }}
            </div>
        </div>
        
        
        <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.category.table') }}"> Back</a>
        </div>
    </div>
@endsection