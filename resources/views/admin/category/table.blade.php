@extends('admin.dashboard')
@section('content')

<h4 class="card-title">Category Table</h4>
<p class="card-description"> Please check before <code>DELETE</code></p>

@if ($message = Session::get('success'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        </div>
    </div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>List of Categories</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.category.create') }}"> Add New Category</a>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="accordion" id="categoryAccordion">
                        @foreach ($category as $p)
                            <div class="card">
                                <div class="card-header" id="categoryHeading{{ $p->id }}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link category-button" type="button" data-toggle="collapse" data-target="#categoryCollapse{{ $p->id }}" aria-expanded="true" aria-controls="categoryCollapse{{ $p->id }}">
                                            {{ $p->category_name }}
                                        </button>
                                    </h2>
                                </div>

                                <div id="categoryCollapse{{ $p->id }}" class="collapse" aria-labelledby="categoryHeading{{ $p->id }}" data-parent="#categoryAccordion">
                                    <div class="card-body">
                                        <strong>Description:</strong> {{ $p->description }}<br>
                                        <strong>Joined On:</strong> {{ $p->created_at }}<br>
                                        <form action="{{ route('admin.category.destroy',$p->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('admin.category.show',$p->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('admin.category.edit',$p->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
