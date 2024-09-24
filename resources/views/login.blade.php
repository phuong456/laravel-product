<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<body>
    <h1>Login Your Account</h1>

    @if(session('message'))
        <div style="color: red;">{{ session('message') }}</div>
    @endif
    <form action="{{ url('checkLogin') }}" method="post">
        {{ csrf_field() }}
        <div>
            User name:  <input type="text" name="Username" required>
        </div>
        <div>
            Password:  <input type="password" name="pwd" required>
        </div>
        <div><input type="submit" value="Login"></div>
    </form>
</body>
</html>