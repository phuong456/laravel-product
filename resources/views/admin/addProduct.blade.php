<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Add New Product</h1>
    <form action="{{ url('admin/addProduct') }}" method="post">
        {{ csrf_field() }}
        <div>
            Product Name: <input type="text" name="name" required>
        </div><br>
        <div>
            Unit Price: <input type="number" name="price" required max="200000" min="10000">
        </div><br>
        <div>
            Descriptions: <textarea name="descriptions"></textarea>
        </div><br>
        <div>
            <input type="submit" value="Add Product">
        </div>
    </form>
</body>
</html>