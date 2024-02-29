@extends('layouts.template')

@section('content')

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Check Out Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Your Table
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="index.html">
						        		<p><input type="text" placeholder="Table Number"></p>
						        		<!-- <p><input type="email" placeholder=""></p>
						        		<p><input type="text" placeholder="Address"></p> -->
						        		<p><input type="tel" placeholder="Phone"></p>
						        		<p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Add remarks"></textarea></p>
						        	</form>
									
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingTwo">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Shipping Address
						        </button>
						      </h5>
						    </div>
						    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="shipping-address-form">
						        	<p>Your shipping address form is here.</p>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Card Details
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="card-details">
						        	<p>Your card details goes here.</p>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Your order Details</th>
									<th> </th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr>
									<td>Product</td>
									<td>Price</td>
								</tr>
								@foreach ($cartItems as $productId => $item)
								<tr>
									<td>{{ $item['product']['name'] }}</td>
									<td> RM{{ number_format($item['product']['price'] * $item['quantity'], 2) }}</td>
								@endforeach
								</tr>
								
								
								<!-- <tr>
									<td>Berry</td>
									<td>$70.00</td>
								</tr>
								<tr>
									<td>Lemon</td>
									<td>$35.00</td>
								</tr> -->
							</tbody>
							<tbody class="checkout-details">
								<!-- <tr>
									<td>Subtotal</td>
									<td>$190</td>
								</tr>
								<tr>
									<td>Shipping</td>
									<td>$50</td>
								</tr> -->
								<tr>
									<td>Total Payment</td>
									<td>RM{{ number_format(collect($cartItems)->sum(function ($item) {
                					return $item['quantity'] * $item['product']['price'];}), 2) }}</td>
								
								</tr>
							</tbody>
						</table>
						<!-- <a href="#" class="boxed-btn">Place Order</a> -->
						<!-- <a href="{{ route('payment')}}" class="boxed-btn">Place Order</a> -->
						
						<form action="{{ route('payment') }}" method="post">
						<div class="cart-buttons">
					    <button type="submit">Place Order</button>
						</div>
						</form>

						<form action="/session" method="POST">
                                <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type='hidden' name="total" value="6">
                                <input type='hidden' name="productname" value="Asus Vivobook 17 Laptop - Intel Core 10th">
                                <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                        </form>
						
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- end check out section -->
@endsection