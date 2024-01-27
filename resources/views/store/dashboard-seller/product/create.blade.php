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
    </form>
@endsection
