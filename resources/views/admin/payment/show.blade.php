@extends('admin.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Payment Details</h2>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Transaction Id :</strong>
                {{ $payment->transaction_id}}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payment Amount :</strong>
               RM {{ number_format($payment-> payment_amount,2)}}
            </div>
        </div>
    
        <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.payment.index') }}"> Back</a>
        </div>
    </div>
@endsection