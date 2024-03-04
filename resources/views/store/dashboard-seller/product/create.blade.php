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
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
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
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category')
                                <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
                            </div>
                            @error('description')
                                <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
                            </div>
                            @error('price')
                                <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Stock</label>
                            <div class="col-sm-9">
                                <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}">
                            </div>
                            @error('stock')
                                <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row col-sm-12 fallback mb-3">
                            {{-- <label class="col-sm-3 col-form-label">Image</label> --}}
                            {{-- <div class="col-sm-12 fallback"> --}}
                                <input type="file" name="image[]" id="image" class="form-control" value="{{ old('images') }}" multiple>
                            {{-- </div> --}}
                            
                            @error('images')
                                <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="dz-message needsclick">
                            <i class="h1 text-muted dripicons-cloud-upload"></i>
                            <h3>Drop files here or click to upload.</h3>
                            <span class="text-muted font-13">(This is just a demo dropzone. Selected files are
                                <strong>not</strong> actually uploaded.)</span>
                        </div>
                        <div class="dropzone-previews my-3" id="file-previews"></div> 
                        {{-- <img id="preview" src="" alt="Preview" style=" display: none; max-width: 200px; margin-top: 10px;">    --}}
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
<div id="preview-container"></div>

<div class="d-none" id="uploadPreviewTemplate">
    <div class="card mt-1 mb-0 shadow-none border">
        <div class="p-2">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                </div>
                <div class="col ps-0">
                    <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                    <p class="mb-0" data-dz-size></p>
                </div>
                <div class="col-auto">
                    <!-- Button -->
                    <a href="#" class="btn btn-link btn-lg text-muted" data-dz-remove>
                        <i class="dripicons-cross"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImages(input) {
        var previewContainer = document.getElementById('preview-container');
        previewContainer.innerHTML = ''; // Clear previous previews

        for (var i = 0; i < input.files.length; i++) {
            var file = input.files[i];
            var reader = new FileReader();

            // Use a closure to capture the correct file and reader values
            (function(file, reader) {
                reader.onloadend = function() {
                    var img = document.createElement('img');
                    img.src = reader.result;
                    img.style.maxWidth = '100px'; // Set max width for preview images
                    img.style.marginRight = '10px'; // Add some spacing between images
                    previewContainer.appendChild(img);
                }

                if (file) {
                    reader.readAsDataURL(file);
                }
            })(file, reader);
        }
    }

    // Attach the previewImages function to the change event of the file input
    document.getElementById('images').addEventListener('change', function() {
        previewImages(this);
    });
</script>
    {{-- <h1>Create Product</h1>

    <form action="/dashboard-seller/product/create" method="POST" enctype="multipart/form-data">
        @csrf

        <label style="margin: 1rem 0 .3rem; display: block" for="name">Name</label>
        @error('name')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="name" id="name" value="{{ old('name') }}">

        <label style="margin: 1rem 0 .3rem; display: block" for="category">Category</label>
        @error('category')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <select name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label style="margin: 1rem 0 .3rem; display: block" for="description">Description</label>
        @error('description')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="description" id="description" value="{{ old('description') }}">

        <label style="margin: 1rem 0 .3rem; display: block" for="price">Price</label>
        @error('price')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="number" name="price" id="price" value="{{ old('price') }}">

        <label style="margin: 1rem 0 .3rem; display: block" for="stock">Stock</label>
        @error('stock')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="number" name="stock" id="stock" value="{{ old('stock') }}">

        <label style="margin: 1rem 0 .3rem; display: block" for="images">Images</label>
        @error('images')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="file" name="images[]" id="images" value="{{ old('images') }}" multiple>
        <div id="preview-container"></div>

        <script>
            function previewImages(input) {
                var previewContainer = document.getElementById('preview-container');
                previewContainer.innerHTML = ''; // Clear previous previews

                for (var i = 0; i < input.files.length; i++) {
                    var file = input.files[i];
                    var reader = new FileReader();

                    // Use a closure to capture the correct file and reader values
                    (function(file, reader) {
                        reader.onloadend = function() {
                            var img = document.createElement('img');
                            img.src = reader.result;
                            img.style.maxWidth = '100px'; // Set max width for preview images
                            img.style.marginRight = '10px'; // Add some spacing between images
                            previewContainer.appendChild(img);
                        }

                        if (file) {
                            reader.readAsDataURL(file);
                        }
                    })(file, reader);
                }
            }

            // Attach the previewImages function to the change event of the file input
            document.getElementById('images').addEventListener('change', function() {
                previewImages(this);
            });
        </script>


        <button type="submit">Save</button>
    </form> --}}
@endsection
