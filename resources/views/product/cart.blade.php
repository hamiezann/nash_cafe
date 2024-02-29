@extends('layouts.template')
<style>
    .btn-primary {
        background-color: #0A35E2; /* Blue background color for primary button */
        color: #fff; /* White text color for primary button */
        border-radius: 5px; /* Rounded borders for buttons */
        padding: 8px 16px; /* Adjust padding as needed */
        border: none; /* Remove button border */
        cursor: pointer;
        width: 200;
    }

    .btn-secondary {
        background-color: #F40E31; /* Blue background color for primary button */
        color: #fff; 
        border-radius: 5px; /* Rounded borders for buttons */
        padding: 8px 16px; /* Adjust padding as needed */
        border: none; /* Remove button border */
        cursor: pointer;
        width: 200;
    }

    /* Add these styles to your existing CSS file or create a new one */

.cart-summary {
    border: 1px solid #ccc;
    padding: 15px;
    margin-bottom: 20px;
}

.cart-summary h6 {
    font-size: 18px;
    margin-bottom: 10px;
}

.cart-summary ul {
    list-style-type: none;
    padding: 0;
}

.cart-summary li {
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
}

.cart-summary li:last-child {
    border-bottom: none;
}

.cart-summary strong {
    margin-right: 5px;
}

.cart-summary p {
    font-size: 16px;
    color: #888;
}

/* Optional: Add some spacing and styling for an empty cart message */
.empty-cart-message {
    margin-top: 20px;
    font-size: 16px;
    color: #888;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

select {
    width: 100%;
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

/* Optional: Add styling for selected options */
select option[selected] {
    background-color: #e0e0e0;
    font-weight: bold;
}

</style>
@section('content')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                @if (session('success'))
                    <div class="custom-success-message">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="custom-success-message">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove">Drop Product</th>
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($cartItems))
                                <tr class="table-body-row">
                                    <td colspan="6">Empty Cart</td>
                                </tr>
                            @else
                                @foreach ($cartItems as $productId => $item)
                                    <tr class="table-body-row">
                                        <td class="product-remove">
                                            <a href="{{ route('cart.remove', ['productId' => $productId]) }}">
                                                <i class="far fa-window-close"></i>
                                            </a>
                                        </td>
                                        <td class="product-image">
                                            <img src="{{ asset('storage/' . $item['product']['image']) }}" alt="">
                                        </td>
                                        <td class="product-name">{{ $item['product']['name'] }}</td>
                                        
                                        <td class="product-price">RM{{ number_format($item['product']['price'], 2) }}</td>

                                        <form action="{{ route('cart.update', ['productId' => $productId]) }}" id="updateForm{{ $productId }}" method="POST">
                                            @csrf
                                            <td class="product-quantity">
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}">
                                            </td>
                                            <td>
                                                <div class="update-bar-tablecell">
                                                    <button type="submit">Update Cart</button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">

                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Subtotal: </strong></td>
                                <td>RM{{ number_format(collect($cartItems)->sum(function ($item) {
                                    return $item['quantity'] * $item['product']['price'];
                                }), 2) }}
                            </td>
                            </tr>
                                <!-- @if (!empty($cartItems))
                                @foreach ($cartItems as $productId => $item)
                            <tr class="total-data">
                            
                                <td><strong>Store: </strong></td>
                                <td> {{ $item['store_id'] }}</td>
                            </tr>
                            <tr class="total-data">
                            
                                <td><strong>OrderOption: </strong></td>
                                <td> {{ $item['order_option'] }}</td>
                            </tr>
                            @break  {{-- This will exit the loop after the first iteration --}}
                            @endforeach
                            @endif
                        </tbody> -->
                    </table>
                    <form action="{{ route('update.store') }}" method="post">
 

    @csrf
    <div class="form-group">
        <label for="store_id">Select Store:</label>
        <select name="store_id" id="store_id">
            @foreach ($stores as $store)
                <option value="{{ $store->id }}" {{ session('store_id') == $store->id ? 'selected' : '' }}>
                    {{ $store->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <label  for="order_option">Ordering Option: </label><br> 
    <select name="order_option" id="order_option">
        <option value="Dine In" {{ session('order_option') == 'Dine In' ? 'selected' : '' }}>
            Dine In
        </option>
        <option value="Takeaway" {{ session('order_option') == 'Takeaway' ? 'selected' : '' }}>
            Takeaway
        </option>2
    </select>

    </div>
    @if (!empty($cartItems))
    <div class="cart-summary">
        <h5>Additional Settings</h5>
        <ul>
            @foreach ($cartItems as $productId => $item)
                <li>
                
                    <strong>Store:</strong> {{ $item['store_id'] }}<br>
                    <strong>Order Option:</strong> {{ $item['order_option'] }}<br>
                </li>
                @break  {{-- This will exit the loop after the first iteration --}}
            @endforeach
        </ul>
    </div>
@else
    <p>Your cart is empty.</p>
@endif



    <button type="submit" class="btn btn-primary">Update Store</button>
</form>


                    <!-- <div class="cart-buttons"> -->
                        <form action="{{ route('payment.initiate') }}" method="post">
                            @csrf
                            <input type="hidden" name="cartItems" value="{{ json_encode($cartItems) }}">
                            <button type="submit" class="btn btn-secondary">Check Out</button>
                        </form>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

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
<!-- end logo carousel -->
@endsection
