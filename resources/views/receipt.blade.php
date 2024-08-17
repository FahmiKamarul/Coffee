<!DOCTYPE html>
<html>
<head>
    <title>Order Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .order-info {
            margin-bottom: 20px;
        }
        .order-info p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
            color: #2c3e50;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tfoot td {
            font-weight: bold;
        }
        .total-price {
            text-align: right;
            margin-top: 20px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Order Receipt</h1>
        <div class="order-info">
            <p>Order ID: {{ $order->orderID }}</p>
            <p>Date: {{ $order->created_at }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->productName }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>RM{{ number_format($product->productPrice, 2) }}</td>
                    <td>RM{{ number_format($product->productPrice * $product->pivot->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total-price">Total Price:</td>
                    <td class="total-price">RM{{ number_format($order->total_price, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>
