<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="product-details">
        <h1>{{ $product->name }}</h1>
        <p><strong>Price:</strong> {{ $product->price }}</p>
        <p><strong>store:</strong> {{ $product-> store->name }}</p>
        <p><strong>Address:</strong> {{ $product-> store->address }}</p>

        <p><strong>Description:</strong> {{ $product->description }}</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back to List</a>
    </div>    
</body>
</html>

