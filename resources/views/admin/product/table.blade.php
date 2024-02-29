@extends('admin.dashboard')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Products</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('admin.product.create') }}"> Add New Product</a>
        </div>
    </div>
</div> -->
<div class="card">
    <div class="card-body">

    <h4 class="card-title">Product Table</h4>
    
    <p class="card-description"> Please check before <code>DELETE</code></p>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="pull-right">
            <a class="btn btn-success" href="{{ route('admin.product.create') }}"> Add New Product</a>
        </div>


<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Category Id</th>
                <th>Created On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $p)
            <tr>
                <tr>
                    
                </tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->product_name }}</td>
                <td>{{ $p->description}}</td>
                <td>{{ $p->image}}</td>
                <td>{{ $p->category_id}}</td>
                <td>{{ $p->created_at }}</td>
                <td>
                    <form action="{{ route('admin.product.destroy',$p->id) }}" method="POST">

                        <a class="btn btn-outline-success btn-sm" href="{{ route('admin.product.show',$p->id) }}">Show</a>

                        <a class="btn btn-outline-warning btn-sm" href="{{ route('admin.product.edit',$p->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
</div>
</div>
@endsection
