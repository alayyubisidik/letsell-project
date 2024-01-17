@extends('store.dashboard-seller.layout.main')

@section('title', '- Product')
    

@section('content')
    <h1>Product Manajamen</h1>

    <a href="/dashboard-seller/product/create">Create a new product</a>

    <style>
        td, th{
            padding: 1rem
        }
    </style>

    <table>
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img style="width: 10rem" src="{{ asset('/storage/image-product/' . $product->image) }}" alt="">
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="">Edit</a>
                    <a href="">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection