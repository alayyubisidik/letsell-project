<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

    </style>
</head>
<body>
    <h1>{{ $store->name }}</h1>
    @if (Auth::user() && Auth::user()->role == 'seller')
        <a href="/dashboard-seller">Dashboard Seller</a>
    @endif
    <p>{{ $store->description }}</p>
    <p>{{ $store->locate }}</p>
    <img width="200" src="{{ asset('/storage/store-image/' . $store->image) }}" alt="">
</body>
</html>