@extends('layout.main')

@section('title', '- Product')

@section('content')

    <h1>Product</h1>

    <div style="background-color: #aaa; display: flex; gap: 2rem">
        <div>
            <p>Search by category</p>
            <form action="/product" method="GET" id="searchForm">
                <select name="search" onchange="submitForm()">
                    <option value="">All Product</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}" {{ ($category->name == request('search')) ? 'selected' : '' }}>
                            {{ $category->name }} ({{ $category->products_count }})
                        </option>
                    @endforeach
                </select>
            </form>
            
            <script>
                function submitForm() {
                    document.getElementById("searchForm").submit();
                }
            </script>
        </div>

        <div>
            <form action="/product" method="GET" >
                <input type="number" name="min" placeholder="Rp MIN" value="{{ request('min') }}">
                <input type="number" name="max" placeholder="Rp MAX" value="{{ request('min') }}">
                <button type="submit">Apply</button>
            </form>
        </div>
    </div>

    <div style="background-color: #cbd5e1; display: flex; gap: 1.5rem; padding: 1rem; flex-wrap: wrap; justify-content: center">
        @foreach ($products as $product)
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

@endsection
