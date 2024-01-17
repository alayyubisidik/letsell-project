<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Seller @yield('title')</title>
</head>
<body>
    <div class="" style="display: flex; gap: 2rem">
        <div class="" style="background-color: #aaa; width: 20%;">
            <ul style="display:flex; flex-direction: column; gap: 2rem">
                <li>
                    <a href="/dashboard-seller">Dashboard</a>
                </li>
                <li>
                    <a href="/dashboard-seller/store">Store</a>
                </li>
                <li>
                    <a href="/dashboard-seller/product">Product</a>
                </li>
            </ul>
        </div>
    
        <div class="" style="width: 80%; min-height: 100vh; background-color: #ddd;">
            @yield('content')
        </div>
    </div>

</body>
</html>