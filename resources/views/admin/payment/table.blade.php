@section('content')

<div class="col-lg-12 grid-margin stretch-card">
<!-- <div class="row"> -->
        <!-- <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Payments</h2>
            </div>
        </div>
    </div> -->
    <div class="card">
    <div class="card-body">

    
<h4 class="card-title">Payment Table</h4>
    <p class="card-description"> Please check before <code>DELETE</code></p>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Transaction Id</th>
            <th>Payment Amount</th>
            <th>Created On</th>
            <th width="50px">Action</th>
        </tr>
        <thead>
        @foreach ($payment as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->transaction_id }}</td>
            <td>RM{{ number_format( $p->payment_amount,2)}}</td>
          
            <td>{{ $p->created_at }}</td>
            <td>
                <form action="{{ route('admin.payment.destroy',$p->id) }}" method="POST">
   
                    <a class="btn btn-outline-success btn-md" href="{{ route('admin.payment.show',$p->id) }}">Show</a>
    
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-outline-danger btn-md">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div></div></div>
@endsection