@extends('layout.main')

@section('title', '- ' . $product->name )

@section('content')

    <div style="background-color: #ccc; padding: 1rem; display: flex; gap: 2rem; margin-top: 2rem; position: relative;">
        <a href="#" style="position: absolute; top: 0; right: 0;">Report</a>
        <div style="width: 35%">
            <img style="width: 100%" src="{{ asset('storage/product-image/' . $product->productImages[0]->image) }}" alt="">
        </div>
        <div class="">
            <h2>{{ $product->name }}</h2>
            <p style="font-size: small; color: gray">by <a href="/product->store/{{ $product->store->slug }}">{{ $product->store->name }}</a> on <a href="product?search={{ $product->category->name }}">{{ $product->category->name}}</a></p>

            <p style="font-size: large; font-weight: bold;">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

            <form action="/cart" method="POST">
                @csrf
                @if (session('message-error'))
                    <p style="color: red; font-size: small;">{{ session('message-error') }}</p>
                @endif
                @if (session('message-success'))
                    <p style="color: green; font-size: small;">{{ session('message-success') }}</p>
                @endif
                <div style="display: flex; gap: 1rem">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <p>Quantity</p>
                    <input type="number" name="quantity" >
                    <p>{{ $product->stock }} pieces available</p>
                </div>
    
                <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                    <button type="submit">Add to cart</button>
                    <a href="">Buy Now</a>
                </div>
            </form>

        </div>
    </div>

    <div style="background-color: #ccc; display: flex; gap: 1rem; margin-top: 2rem; padding: 1rem">
        <div style="width: 30%;">
            <div style="display: flex; gap: 1rem;">
                <div style="border-radius: 50%; width: 40%; overflow: hidden;">
                    <img style="width: 100%" src="{{ asset('storage/store-image/' . $product->store->image) }}" alt="">
                </div>
                <div>
                    <h2>{{ $product->store->name }}</h2>
                </div>
            </div>
        </div>
        <div style="width: 70%; display: flex; flex-direction: column">
            <p>Products : {{ $storeProductCount }}</p>
            <p>Rating : 4,9 (10000 penilaian)</p>
            <p>Joined : {{ $product->store->created_at->diffForHumans() }}</p>
        </div>
    </div>

    <div style="background-color: #ccc; margin-top: 2rem; padding: 1rem">
        <h2>Product Description</h2>

        {{ $product->description }}
    </div>

    <div style="background-color: #ccc; margin-top: 2rem; padding: 1rem">
        <h2>Product Rating</h2>

    </div>

    <div style="background-color: #ccc; margin-top: 2rem; padding: 1rem; ">
        <h2>From the same shop</h2>
        <div style="display: flex; gap: 1.5rem; flex-wrap: wrap; justify-content: center; margin-top: 1rem;">
            @foreach ($productByStore as $product)
                <a href="/product/{{ $product->slug }}">
                    <div class="card" style="width: 18rem; background-color: #fff;">
                        <img style="width: 100%" src="{{ asset('storage/product-image/' . $product->productImages[0]->image) }}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p style="font-size: small; color: gray">by <a href="/store/{{ $product->store->slug }}">{{ $product->store->name }}</a> on <a href="product?search={{ $product->category->name }}">{{ $product->category->name}}</a></p>
        
                            <p style="font-size: large; font-weight: bold; color: orange">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>




@endsection
