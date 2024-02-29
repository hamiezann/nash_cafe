@extends('admin.dashboard')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Customers</h2>
        </div>
    </div>
</div> -->
<div class="card">
    <div class="card-body">

    
<h4 class="card-title">Customer Table</h4>
    <p class="card-description"> Please check before <code>DELETE</code></p>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>E-mail</th>
                <th  width="100px">Password</th>
                <th>Created On</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->email}}</td>
                <td>{{ $p->password}}</td>
                <td>{{ $p->created_at }}</td>
                <td>
                    <form action="{{ route('admin.customer.destroy',$p->id) }}" method="POST">

                        <a class="btn btn-outline-success btn-md" href="{{ route('admin.customer.show',$p->id) }}">Show</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-outline-danger btn-md">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div></div></div>
@endsection
