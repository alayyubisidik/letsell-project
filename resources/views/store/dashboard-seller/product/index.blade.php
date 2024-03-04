@extends('store.dashboard-seller.layout.main')

@section('title', '- Product')
    

@section('content')
    {{-- <h1>Product Manajamen</h1>

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
    </table> --}}

    <div class="container-fluid">
                        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manajemen Product</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Manajemen Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title --> 
    
    
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="header-title">Basic Data Table</h4> --}}
                        <a href="/dashboard-seller/product/create" class="btn btn-primary mb-3">Create New Product</a>
    
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="/dashboard-seller/product/edit/{{ $product->slug }}">Edit</a>
                                        <a class="btn btn-danger" href="/dashboard-seller/product/delete/{{ $product->slug }}">Hapus</a>
                                        <a class="btn btn-primary" href="/dashboard-seller/product-image/{{ $product->slug }}">Edit Product Image</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->
    </div> <!-- container -->

@endsection