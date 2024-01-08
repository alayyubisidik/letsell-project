<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    @if (session('message-error'))
        <p style="color: red; margin:0; font-size: 14px;">{{ session('message-error') }}</p>
    @endif

    <form action="/login" method="POST">

        @csrf

        <label style="margin: 1rem 0 .3rem; display: block" for="username">Username</label>
        @error('username')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="username" id="username" value="{{ old('username') }}" >
        
        <label style="margin: 1rem 0 .3rem; display: block" for="password">Password</label>
        @error('password')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="password" name="password" id="password"> 

        <button type="submit" style="display: block; margin: 2rem 0">Login</button>

    </form>

    <a href="/register">Register</a>
</body>
</html>