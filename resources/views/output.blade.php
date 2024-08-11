<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>{{ $product->name }}</h1>

    <img src="{{ asset('storage/coffeList/' . $product->image) }}" alt="Product Image">


</body>
</html>
