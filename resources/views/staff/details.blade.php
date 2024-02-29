@extends('staff.dashboard')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Order Item</h2>
            </div>
         
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Order Id</th>
            <th>Product Id</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Created At</th>
            <th>Updated At</th>
           
        </tr>
       
        @foreach ($order_item as $p)
       
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->order_id }}</td>
            <td>{{ $p->product_id}}</td>
         
            <td>{{ $p->quantity}}</td>
            <td>RM{{ number_format($p->order_amount,2)}}</td>
            <td>{{ $p->created_at}}</td>
            <td>{{ $p->updated_at}}</td>

        </tr>

        @endforeach
    </table>
@endsection