@extends('staff.dashboard')
@section('content')

<h2>Update Order Status</h2>

<form action="{{ route('status.update', $order->id) }}" method="post">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="order_status">Select Status:</label>
        <select name="order_status" id="order_status" class="form-control">
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Status</button>
</form>

@endsection