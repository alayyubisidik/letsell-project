@extends('store.dashboard-seller.layout.main')

@section('title', '- Product')


@section('content')
    <h1>Create Product Image</h1>

    <form action="/dashboard-seller/product-image/create/{{ $slug }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="image" style="margin: 1rem 0 .3rem; display: block">Image</label>
        @error('image')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="file" name="image" id="image" onchange="previewImage(this)">
        <img id="preview" src="" alt="Preview" style=" display: none; max-width: 200px; margin-top: 10px;">        

        <button type="submit">Save</button>
    </form>

    <script>
        function previewImage(input) {
            var preview = document.getElementById('preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }

    </script>
@endsection
