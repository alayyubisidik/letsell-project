@extends('layout.main')

@section('title', '- ' . $product->name)

@section('content')

    <div style="background-color: #ccc; padding: 1rem; display: flex; gap: 2rem; margin-top: 2rem; position: relative;">
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Choose a reason</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/report" method="POST">
                            @csrf
                            <select name="content" class="form-select form-select-lg mb-3" aria-label="Large select example" required>
                                <option selected value="Jual narkoba">Jual narkoba</option>
                                <option value="Barang ilegal">Barang ilegal</option>
                                <option value="Barang haram">Barang haram</option>
                                <option value="Melanggar hak cipta">Melanggar hak cipta</option>
                            </select>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Report</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <button style="position: absolute; top: 0; right: 0;"  class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Report</button>
        {{-- <a href="#" style="position: absolute; top: 0; right: 0;">Report</a> --}}
        <div style="width: 35%">
            <img style="width: 100%" src="{{ asset('storage/product-image/' . $product->productImages[0]->image) }}"
                alt="">
        </div>
        <div class="">
            <h2>{{ $product->name }}</h2>
            <p style="font-size: small; color: gray">by <a
                    href="/store/{{ $product->store->slug }}">{{ $product->store->name }}</a> on <a
                    href="product?search={{ $product->category->name }}">{{ $product->category->name }}</a></p>

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
                    @error('quantity')
                        <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                    @enderror
                    <input type="number" name="quantity">
                    <p>{{ $product->stock }} pieces available</p>
                </div>

                <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                    <button type="submit">Add to cart</button>
                    <button>
                        <a href="/wishlist/create/{{ $product->id }}">Add to wishlist</a>
                    </button>
                </div>
            </form>

        </div>
    </div>

    <div style="background-color: #ccc; display: flex; gap: 1rem; margin-top: 2rem; padding: 1rem">
        <div style="width: 30%;">
            <div style="display: flex; gap: 1rem;">
                <div style="border-radius: 50%; width: 40%; overflow: hidden;">
                    <img style="width: 100%" src="{{ asset('storage/store-image/' . $product->store->image) }}"
                        alt="">
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
                        <img style="width: 100%"
                            src="{{ asset('storage/product-image/' . $product->productImages[0]->image) }}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p style="font-size: small; color: gray">by <a
                                    href="/store/{{ $product->store->slug }}">{{ $product->store->name }}</a> on <a
                                    href="product?search={{ $product->category->name }}">{{ $product->category->name }}</a>
                            </p>

                            <p style="font-size: large; font-weight: bold; color: orange">Rp
                                {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>




@endsection
