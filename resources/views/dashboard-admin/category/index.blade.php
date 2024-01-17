@extends('dashboard-admin.layout.main')

@section('title', '- Category')

@section('content')
    <h1>Category Manajemen</h1>

    <a href="/dashboard-admin/category/create">Create a new Category</a>

    <table cellpadding="10">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Product Count</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->products_count }}</td>
            </tr>
        @endforeach
    </table>
@endsection