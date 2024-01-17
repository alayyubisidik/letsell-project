@extends('store.dashboard-seller.layout.main')

@section('title', '- Banner Edit')
    

@section('content')
    <h1>Edit Banner</h1>

    <form action="/dashboard-seller/store/banner/edit?banner_id={{ $banner->id }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        
        <label for="banner" style="margin: 1rem 0 .3rem; display: block">Banner</label>
        <input type="file" name="banner" id="banner" onchange="previewImage(this)">
        <img id="preview" src="{{  asset('/storage/banner-store/' . $banner->image) }}" alt="Preview" style=" max-width: 200px; margin-top: 10px;">

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