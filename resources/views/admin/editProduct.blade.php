<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="{{ url('admin/editProduct/'.$product->code) }}" method="post">
        {{ csrf_field() }}
        <div>
            Product Name: <input type="text" name="name" value="{{ $product->name }}" required>
        </div>
        <div>
            Unit Price: <input type="number" name="price" value="{{ $product->price }}" max="200000" min="10000" required>
        </div>
        <div>
            Descriptions: <textarea name="descriptions">{{ $product->descriptions }}</textarea>
        </div>
        <div>
            <input type="submit" value="Edit Product">
        </div>
    </form>
</body>
</html>