@extends('store.dashboard-seller.layout.main')

@section('title', '- Product')
    

@section('content')
    <h1>Create Product</h1>

    <form action="/dashboard-seller/product/create" method="POST" enctype="multipart/form-data">
        @csrf

        <label style="margin: 1rem 0 .3rem; display: block" for="name">Name</label>
        @error('name')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="name" id="name" >

        <button type="submit">Save</button>
    </form>

@endsection