@extends('layouts.template')

@section('content')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Thank You For Buying</p>
                    <h1>Order Status</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* Add this style in your CSS file or in a style tag within your HTML file */

    .cart-section {
        /* background-color: #F1E9F9 ; */
        /* background-color: #C4E9F6  ; */
        background-color: #CCD1D1 ;
        color: #fff; 
        /* border-radius: 10px;  */
        padding: 10px; 
    }

    .order-detail{
        /* background-color:#3498db ; */
        background-color:#fff ;
        border-radius: 10px;
        padding: 50px;
    }

    .success-message {
       background-color: #2ecc71; 
        color: #fff;
        padding: 10px;
        height: 40px;
        border-radius: 5px;
        margin-bottom: 20px; 

        /* margin: 10px 0;
        padding: 10px;
        border-radius: 3px 3px 3px 3px;
        color: #270;
        background-color: #DFF2BF; */

    }

    .card {
        background-color: #fff; /* White background color for cards */
        border-radius: 10px; /* Rounded borders for cards */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow for cards */
    }

    .btn-primary {
        background-color: #0A35E2; /* Blue background color for primary button */
        color: #fff; /* White text color for primary button */
        border-radius: 5px; /* Rounded borders for buttons */
        padding: 8px 16px; /* Adjust padding as needed */
        border: none; /* Remove button border */
        cursor: pointer;
    }
    .btn-secondary {
        background-color: #F11461; /* Blue background color for primary button */
        color: #fff; /* White text color for primary button */
        border-radius: 5px; /* Rounded borders for buttons */
        padding: 8px 16px; /* Adjust padding as needed */
        border: none; /* Remove button border */
        cursor: pointer;
    }

    .cart-table-wrap {
        background-color: #fff; /* White background color for the table */
        border-radius: 10px; /* Rounded borders for the table */
        /* overflow: hidden; 
         overflow: auto; 
        max-height: 300px;  */
        width: auto;
    }

    .cart-table {
        width: 100%;
        table-layout: fixed; 
    }

    
    @media screen and (max-width: 767px) {
        .cart-table th,
        .cart-table td {
            display: block;
            width: 100%;
            box-sizing: border-box;
        }

        .cart-table th {
            text-align: center;
        }

        .cart-table td {
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    }

    .order-btns {
        text-align: center;
        margin-bottom: 20px;
    }

    .order-btns button {
        margin: 0 10px;
    }


</style>

@if (session('success'))
    <div class="success-message">
    <i class="fa fa-check"></i>
        {{ session('success') }}
    </div>
    @endif
    <!-- Add styles and JavaScript for the buttons -->
	<div class="mt-150">
		<div class="container">
			<!-- <div class="row"> -->
<div class="order-btns">
    <button class="btn btn-primary" onclick="showOngoing()">Ongoing</button>
    <button class="btn btn-primary" onclick="showCompleted()">Completed</button>
</div>

<div class="cart-section mt-200 mb-150" id="ongoingOrders">
    <div class="container">
    <div class="text-center pt-5">
    <h3>~ Ongoing Orders ~</h3>
</div>

        <div class="row">
       
            <!-- Ongoing orders loop goes here -->
            @foreach ($userOrders as $order)
                <div class="col-lg-12 col-md-12">
                    <hr>
                    <div class="order-detail">
                        <h6>Order ID: {{ $order->id }}</h6>
                        <p>Customer Name: {{ $order->user->name }}</p>
                        <p>Order Option: {{ $order->order_option }}</p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#orderDetails{{ $order->id }}" aria-expanded="false" aria-controls="orderDetails{{ $order->id }}">
                            View Order Details
                        </button>
                        <button class="btn btn-secondary print-receipt-btn" type="button" data-order-id="{{ $order->id }}">
                         Print Receipt
                        </button>

                    </div>

                    <div class="collapse mt-3" id="orderDetails{{ $order->id }}">
                        <div class="cart-table-wrap">
                            <table class="cart-table">
                                <thead class="order-table-head">
                                    <tr class="table-head-row">
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderItems as $orderItem)
                                        <tr class="table-body-row">
                                            <td>{{ $orderItem->product->product_name }}</td>
                                            <td>{{ $orderItem->quantity }}</td>
                                            <td>RM{{ number_format( $orderItem->order_amount,2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- <p>Order Status and Total Payment</p> -->
                            <hr>
                            <table class="cart-table ">
                            <thead class="order-table-head">
                                    <tr class="table-head-row">
                                        <th>Order Status</th>
                                        <th>Total Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-content-row">
                                        <td>{{ $order->order_status }}</td>
                                        <td>RM{{ number_format($order->total_price,2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="cart-section mt-200 mb-150" id="completedOrders" style="display: none;">
    <div class="container">
    <div class="text-center pt-5">
    <h3>~ Completed Orders ~</h3>
    </div>

        <div class="row">
            <!-- Completed orders loop goes here -->
            @foreach ($completedOrders as $order)
                <div class="col-lg-12 col-md-12">
                    <hr>
                    <div class="order-detail">
                        <p>Order ID: {{ $order->id }}</p>
                        <p>Table No: {{ $order->user->name }}</p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#orderDetails{{ $order->id }}" aria-expanded="false" aria-controls="orderDetails{{ $order->id }}">
                            View Order Details
                        </button>
                        <button class="btn btn-secondary print-receipt-btn" type="button" data-order-id="{{ $order->id }}">
                         Print Receipt
                        </button>
                    </div>

                    <div class="collapse mt-3" id="orderDetails{{ $order->id }}">
                        <div class="cart-table-wrap">
                            <table class="cart-table">
                                <thead class="order-table-head">
                                    <tr class="table-head-row">
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderItems as $orderItem)
                                        <tr class="table-body-row">
                                            <td>{{ $orderItem->product->product_name }}</td>
                                            <td>{{ $orderItem->quantity }}</td>
                                            <td>RM{{ number_format( $orderItem->order_amount,2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- <p>Order Status and Total Payment</p> -->
                            <hr>
                            <table class="cart-table ">
                            <thead class="order-table-head">
                                    <tr class="table-head-row">
                                        <th>Order Status</th>
                                        <th>Total Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-content-row">
                                        <td>{{ $order->order_status }}</td>
                                        <td>RM{{ number_format($order->total_price,2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr>
                </div>
            @endforeach
        </div>
    </div>
</div>
            </div>
        </div>
    </div>

<!-- Modal -->
<!-- <div class="modal fade" id="paymentSuccessModal" tabindex="-1" aria-labelledby="paymentSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentSuccessModalLabel">Payment Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Thank you for your order! Your payment was successful.</p>
                <p>We will process your order and contact you shortly.</p>
                Display payment details for each order -->
            <!-- </div>
        </div>
    </div>
</div>  -->



<!-- <div class="cart-section mt-200 mb-150">
    <div class="container">
        <h3>List of Orders</h3>
        <div class="row">
            @foreach ($userOrders as $order)
                <div class="col-lg-12 col-md-12">
                    <hr>
                    <div class="order-detail">
                        <p>Order ID: {{ $order->id }}</p>
                        <p>Table No: {{ $order->user->name }}</p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#orderDetails{{ $order->id }}" aria-expanded="false" aria-controls="orderDetails{{ $order->id }}">
                            View Order Details
                        </button>
                    </div>

                    <div class="collapse mt-3" id="orderDetails{{ $order->id }}">
                        <div class="cart-table-wrap">
                            <table class="cart-table">
                                <thead class="order-table-head">
                                    <tr class="table-head-row">
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderItems as $orderItem)
                                        <tr class="table-body-row">
                                            <td>{{ $orderItem->product->product_name }}</td>
                                            <td>{{ $orderItem->quantity }}</td>
                                            <td>RM{{ number_format( $orderItem->order_amount,2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          <p>Order Status and Total Payment</p> 
                            <hr>
                            <table class="cart-table ">
                            <thead class="order-table-head">
                                    <tr class="table-head-row">
                                        <th>Order Status</th>
                                        <th>Total Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-content-row">
                                        <td>{{ $order->order_status }}</td>
                                        <td>RM{{ number_format($order->total_price,2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr>
                </div>
            @endforeach
        </div>
    </div>
</div> -->
<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="{{ asset('interface/assets/img/company-logos/1.png') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{ asset('interface/assets/img/company-logos/2.png') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{ asset('interface/assets/img/company-logos/3.png') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{ asset('interface/assets/img/company-logos/4.png') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{ asset('interface/assets/img/company-logos/5.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showOngoing() {
        document.getElementById("ongoingOrders").style.display = "block";
        document.getElementById("completedOrders").style.display = "none";
    }

    function showCompleted() {
        document.getElementById("ongoingOrders").style.display = "none";
        document.getElementById("completedOrders").style.display = "block";
    }

        // Add an event listener to the print receipt button
        document.addEventListener('DOMContentLoaded', function () {
        const printButtons = document.querySelectorAll('.print-receipt-btn');
        
        printButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Retrieve the order ID from the data attribute
                const orderId = button.getAttribute('data-order-id');
                // Construct the URL for printing the PDF
                const printUrl = "{{ route('print_pdf_user', ['orderId' => ':orderId']) }}".replace(':orderId', orderId);
                // Open the URL for printing
                window.open(printUrl, '_blank');
            });
        });
    });
</script>
<!-- end logo carousel -->

@endsection
