@extends('dashboard-admin.layout.main')

@section('title', '- Product')

@section('content')
    <h1>Create Product</h1>

    <form action="/dashboard-admin/product/create" method="POST">
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name" id="name">

        <button type="submit">Save</button>
    </form>
@endsection