@extends('admin.dashboard')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Orders</h2>
        </div>
    </div>
</div> -->
<div class="card">
    <div class="card-body">


<h4 class="card-title">Order Table</h4>
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
                <th>User Id</th>
                <th>Order Status</th>
                <th>Total Price</th>
                <th>Payment Id</th>
                <th>Order Option</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th width="50px">Action</th>
                <th>Receipt</th>
            </tr>
        </thead> 
        <tbody>
            @foreach ($order as $p)
            <tr>
            @if ($p->order_status === 'Completed')
                <td>{{ $p->id }}</td>
                <td>{{ $p->user_id }}</td>
                <!-- <td>{{ $p->order_status}}</td> -->

               
                 <td>{{ $p->order_status }}</td>
            
           

                <td>{{ $p->total_price}}</td>
                <td>{{ $p->payment_id}}</td>
                <td>{{ $p->order_option}}</td>
                <td>{{ $p->created_at}}</td>
                <td>{{ $p->updated_at}}</td>
               
                <td>

                    <a class="btn btn-outline-success btn-sm" href="{{ route('admin.order.show',$p->id) }}">Show</a>
                </td>
                    <td>
                    <a href="{{ route('print_pdf', ['orderId' => $p->id]) }}" class="btn btn-outline-danger btn-sm">Print PDF</a>
                </td>
                
            </tr> @endif
            @endforeach
        </tbody>
    </table>
</div>

</div>
</div>

</div>
@endsection
