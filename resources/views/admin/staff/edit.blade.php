@extends('admin.dashboard')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Staff</h2>
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
  
    <form action="{{ route('admin.staff.update',$staff->id) }}" method="POST">
        @csrf
        <!-- @method('PUT') -->

        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
            <input type="hidden" name="id" value="{{ $staff->id }}">
                <strong> Name:</strong>
                <input type="text" name="name" value="{{ $staff->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" value="{{ $staff->email }}" placeholder="Email">
                </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Username:</strong>
                    <input type="text" name="username" class="form-control" value="{{ $staff->username }}"placeholder="Username">
                </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="text" name="password" class="form-control" value="{{ $staff->password}}"placeholder="Password">
                </div>
        </div>
        <br>
        <br>
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="{{ route('admin.staff.index') }}"> Back</a>
            </div>
        </div>
   
    </form>
    @endsection