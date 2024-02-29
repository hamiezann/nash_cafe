@extends('staff.dashboard')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">

            <!-- <div class="pull-left">
                <h2>List of Orders</h2>
            </div> -->
<div class="card">
    <div class="card-body">     

    <h4 class="card-title">Order Table</h4>
    <p class="card-description"> Please check before <code>UPDATE</code></p>
 
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
            <th>User Id</th>
            <th>Order Status</th>
            <th>Delivery Option</th>
            <th>Total Price</th>
            <th>Payment Id</th>
            <th>Created At</th>
            <th>Updated At</th>
           
            <th width="280px">Action</th>
        </tr>
        </thead>
        @foreach ($order as $p)
        <tbody>
            <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->user_id }}</td>
            <td>{{ $p->order_status}}</td>
            <td>{{ $p->order_option}}</td>
            <td>RM{{ number_format($p->total_price,2)}}</td>
            <td>{{ $p->payment_id}}</td>
            <td>{{ $p->created_at}}</td>
            <td>{{ $p->updated_at}}</td>
            <td>
                    <a class="btn btn-outline-success btn-sm" href="{{ route('order.details',$p->id) }}">Show</a>
                    <a class="btn btn-outline-warning btn-sm" href="{{ route('status.update.form', $p->id) }}">Update Status</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div></div></div></div>
@endsection