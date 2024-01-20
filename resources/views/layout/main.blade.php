<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Letsell @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="padding: 5rem 10%">
    <div class="" style="display: flex; position: fixed; z-index: 99; top: 0; left: 0; right: 0; justify-content: space-between; background-color: #aaa; align-items: center; padding: .3rem 10%;">
        <div class="">Navbar</div>
        
        <form action="/product" method="GET">
            <div class="input-group mb-3" style="width: 30rem">
                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search by product name, category and store" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>

        <ul style="display: flex; list-style: none; gap: 4rem">
            <li>
                <a href="/product">Product</a>
            </li>
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

    <div class="" style="">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>