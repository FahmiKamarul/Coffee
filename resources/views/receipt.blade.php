<!DOCTYPE html>
<html>
<head>
    <title>Order Receipt</title>
</head>
<body>
    <h1>Order Receipt</h1>
    <p>Order ID: {{ $order->orderID }}</p>
    <p>Date: {{ $order->created_at }}</p>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->productName }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>RM{{ number_format($product->productPrice, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>Total Price: RM{{ number_format($order->total_price, 2) }}</p>
</body>
</html>
