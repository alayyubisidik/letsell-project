@extends('store.dashboard-seller.layout.main')

@section('title', '- Product')


@section('content')
    <h1>Edit Product Image</h1>

    <a href="/dashboard-seller/product-image/create/{{ $slug }}">Create a new product image</a>

    <table>
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach ( $product->productImages as $item )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img width="200" src="{{ asset('/storage/product-image/' . $item->image ) }}" alt="">
                </td>
                <td>
                    {{-- <form action="/dashboard-seller/product-image/edit/{{ $product->slug }}" method="POST">
                        @csrf
                        @error('image')
                            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                        <input type="file" id="image" name="image" onchange="previewImage(this)">
                
                        <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">
                    </form> --}}
                    <a href="/dashboard-seller/product-image/edit/{{ $product->slug }}/{{ $item->id }}">Edit</a>
                    <a href="/dashboard-seller/product-image/delete/{{ $item->id }}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
