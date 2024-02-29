<!DOCTYPE html>
<html>
<head>
    <title>Payment Receipt</title>
    <style>
        body {
            font-family: 'Montserrat', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            border: 2px solid #ccc;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        h1, h3, h5 {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            text-align: left;
            background-color: #f2f2f2;
        }
        .footer-note {
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="interface/assets/img/latest.png" alt="NASH CAFE" width="150">
        </div>
        <h1>Payment Receipt</h1>
        <hr>
        <h3>Order Details</h3>
        <table>
            <tr>
                <th>Order ID</th>
                <td>{{ $order->id }}</td>
            </tr>
            <tr>
                <th>Customer</th>
                <td>{{ $order->user_id }}: {{ $order->user->name }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $order->created_at }}</td>
            </tr>
            <tr>
                <th>Payment ID</th>
                <td>{{ $order->payment_id }}</td>
            </tr>
            <tr>
                <th>Store ID</th>
                <td>{{ $order->store_id }}</td>
            </tr>
        </table>
        <hr>
        <h3>Product Details</h3>
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            @foreach ($product_bought as $p)
                <tr>
                    <td>{{ $p->product->product_name }}</td>
                    <td>{{ $p->quantity }}</td>
                    <td>RM {{ number_format($p->order_amount, 2) }}</td>
                </tr>
            @endforeach
        </table>
        <hr>
        <h5>Total Amount: RM {{ number_format($order->total_price, 2) }}</h5>
        <div class="footer-note">
    Don't miss out on our Freaky February offers! Enjoy delicious meals all month long and keep your loved ones happy. Taste the happiness at Nash Cafe!
</div>

    </div>
</body>
</html>
