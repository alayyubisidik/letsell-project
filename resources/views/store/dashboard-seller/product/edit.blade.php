@extends('store.dashboard-seller.layout.main')

@section('title', '- Product')


@section('content')
    <h1>Edit Product</h1>

    <form action="/dashboard-seller/product/edit/{{ $product->slug }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label style="margin: 1rem 0 .3rem; display: block" for="name">Name</label>
        @error('name')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="name" id="name" value="{{ $product->name }}">

        <label style="margin: 1rem 0 .3rem; display: block" for="category">Category</label>
        @error('category')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <select name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
            @endforeach
        </select>

        <label style="margin: 1rem 0 .3rem; display: block" for="price">Price</label>
        @error('price')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="number" name="price" id="price" value="{{ $product->price }}">

        <label style="margin: 1rem 0 .3rem; display: block" for="stock">Stock</label>
        @error('stock')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="number" name="stock" id="stock" value="{{ $product->stock }}">


        <button type="submit">Save</button>
    </form>
@endsection
