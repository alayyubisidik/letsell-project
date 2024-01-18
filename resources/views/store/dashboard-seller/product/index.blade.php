@extends('store.dashboard-seller.layout.main')

@section('title', '- Product')
    

@section('content')
    <h1>Product Manajamen</h1>

    <a href="/dashboard-seller/product/create">Create a new product</a>

    <style>
        td, th{
            padding: 2rem
        }
    </style>

    <table>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="/dashboard-seller/product/edit/{{ $product->slug }}">Edit</a>
                    <a href="/dashboard-seller/product/delete/{{ $product->slug }}">Hapus</a>
                    <a href="/dashboard-seller/product-image/{{ $product->slug }}">Edit Product Image</a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection