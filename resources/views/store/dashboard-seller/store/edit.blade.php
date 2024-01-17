@extends('store.dashboard-seller.layout.main')

@section('title', '- Store Edit')
    

@section('content')
    <h1>Edit Store</h1>

    <form action="/dashboard-seller/store/edit/{{ $store->slug }}" method="POST" enctype="multipart/form-data"> 
        @csrf

        <label for="name" style="margin: 1rem 0 .3rem; display: block">Name</label>
        <input type="text" name="name" id="name" value="{{ $store->name }}">
        
        <label for="description" style="margin: 1rem 0 .3rem; display: block">Description</label>
        <textarea name="description" id="description" cols="30" rows="10">{{ $store->description }}</textarea>
        
        <label for="locate" style="margin: 1rem 0 .3rem; display: block">Locate</label>
        <input type="text" name="locate" id="locate" value="{{ $store->locate }}">
        
        <label for="image" style="margin: 1rem 0 .3rem; display: block">Image</label>
        <input type="file" name="image" id="image" onchange="previewImage(this)">
        <img id="preview" src="{{  asset('/storage/store-image/' . $store->image) }}" alt="Preview" style=" max-width: 200px; margin-top: 10px;">

        <button style="display: block; margin: 2rem 0">Save</button>

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