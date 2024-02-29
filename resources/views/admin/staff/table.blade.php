@extends('admin.dashboard')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">

<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Staffs</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('admin.staff.create') }}"> Add New Staffs</a>
        </div>
    </div>
</div> -->

        <div class="card">
    <div class="card-body">


<h4 class="card-title">Staff Table</h4>
    <p class="card-description"> Please check before <code>DELETE</code></p>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="pull-right">
            <a class="btn btn-success" href="{{ route('admin.staff.create') }}"> Add New Staffs</a>
        </div>
<div class="table-responsive"> <!-- Added the responsive class here -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Joined On</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staff as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->username }}</td>
                <td>{{ $p->password }}</td>
                <td>{{ $p->created_at }}</td>
                <td>
                    <form action="{{ route('admin.staff.destroy',$p->id) }}" method="POST">

                        <a class="btn btn-outline-success btn-sm" href="{{ route('admin.staff.show',$p->id) }}">Show</a>

                        <a class="btn btn-outline-secondary btn-sm" href="{{ route('admin.staff.edit',$p->id) }}">Edit</a>

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
    </div></div></div>
@endsection
