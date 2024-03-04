@extends('store.dashboard-seller.layout.main')

@section('title', '- Product')


@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manajemen Category</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Product</h4>
            </div>
        </div>
    </div>
    <!-- end page title --> 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="/dashboard-seller/product/create" method="POST" enctype="multipart/form-data" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                    data-upload-preview-template="#uploadPreviewTemplate">
                        @csrf
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
                            </div>
                            @error('name')
                                <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="category_id" id="category_id">
                                    @foreach ($categories as $category)
                                        {{-- <option value="{{ $category->id }}">{{ $category->name }}</option> --}}
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category')
                                <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
                            </div>
                            @error('description')
                                <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div> --}}
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}">
                            </div>
                            @error('price')
                                <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Stock</label>
                            <div class="col-sm-9">
                                <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}">
                            </div>
                            @error('stock')
                                <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <a href="{{ url('/dashboard-seller/product') }}" class="btn btn-secondary">Back</a>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
</div> <!-- container -->

    {{-- <h1>Edit Product</h1>

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
    </form> --}}
@endsection
