@extends('layout.main')

@section('title', '- Wishlist')

@section('content')

    <h1>Wishlist</h1>

    @foreach ($wishlists as $wishlist)
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('/storage/product-image/' . $wishlist->product->productImages[0]->image) }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $wishlist->product->name }}</h5>
                        <p>by <a href="/store/{{ $wishlist->product->store->slug }}">{{ $wishlist->product->store->name }}</a> on <a href="/product?search={{ $wishlist->product->category->slug }}">{{ $wishlist->product->category->name }}</a></p>
                        <p>{{ $wishlist->product->stock }} left in stock</p>
                        @if (session('message-success'))
                            <p style="color: green; font-size: small;">{{ session('message-success') }}</p>
                        @endif
                        <a href="/wishlist/delete/{{ $wishlist->id }}">Delete</a>
                        <p class="card-text"><small class="text-body-secondary">{{ $wishlist->created_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach





@endsection
