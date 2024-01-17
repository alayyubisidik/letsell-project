<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>

    <div class="" style="display: flex; justify-content: space-between; background-color: #aaa; align-items: center; padding: .3rem 10%;">
        <div class="">Navbar</div>
        <ul style="display: flex; list-style: none; gap: 4rem">
            @if (!Auth::user())
                <li>
                    <a href="/login">Login</a>
                </li>
                @else
                <li>
                    <a href="/logout">Logout</a>
                </li>
            @endif
            @if (Auth::user() && Auth::user()->role == 'customer')
                <li>
                    <a href="/store-create">Start Selling</a>
                </li>
                <li>
                    <a href="/profile">Profile</a>
                </li>
            @endif
            @if (Auth::user() && Auth::user()->role == 'seller')
                <li>
                    <a href="/store/{{ session('store')->slug }}">My Store</a>
                </li>
                <li>
                    <a href="/profile">Profile</a>
                </li>
            @endif
        </ul>
    </div>

    <h1>Home</h1>

</body>
</html>