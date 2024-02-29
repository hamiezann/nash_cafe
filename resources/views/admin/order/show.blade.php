@extends('staff.dashboard')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
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
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user_id }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>{{ $order->order_option }}</td>
                                <td>RM{{ number_format($order->total_price, 2) }}</td>
                                <td>{{ $order->payment_id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->updated_at }}</td>
                                <td>
                                    <a class="btn btn-outline-success btn-sm" href="{{ route('order.details', $order->id) }}">Show</a>
                                    <a class="btn btn-outline-warning btn-sm" href="{{ route('status.update.form', $order->id) }}">Update Status</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <p>Total of Total Price: RM{{ number_format($totalPriceSum, 2) }}</p>
        </div>
    </div>
</div>
@endsection
