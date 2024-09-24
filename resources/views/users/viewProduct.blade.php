<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Products</title>
</head>
<body>
    <h1>Products List</h1>
    <br>
    <hr>
    <form action="{{ url('users/viewProduct') }}" method="get">
        Input Price from: <input type="number" name="fromPrice" id="fromPrice"> to: <input type="number" name="toPrice" id="toPrice">
        <input type="submit" value="Search">
    </form>
    <br><br>
    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif
    @if(session('products') == '[]')
        <div style="display: none;">{{ $products = session('products') }}</div>
    @endif
    @if(count($products) > 0)
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>id</th>
                    <th>product name</th>
                    <th>unit price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>