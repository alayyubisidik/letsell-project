<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Store</title>
</head>
<body>
    <h1>Create Store</h1>

    <form action="/store-create" method="POST" enctype="multipart/form-data">

        @csrf

        <label style="margin: 1rem 0 .3rem; display: block" for="name">Name</label>
        @error('name')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="name" id="name" >

        <label style="margin: 1rem 0 .3rem; display: block" for="description">Description</label>
        @error('description')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <textarea name="description" id="description" cols="50" rows="10"></textarea>

        <label style="margin: 1rem 0 .3rem; display: block" for="locate">Locate</label>
        @error('locate')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="locate" id="locate" >

        <label style="margin: 1rem 0 .3rem; display: block" for="image">Image</label>
        @error('image')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="file" id="image" name="image" onchange="previewImage(this)">

        <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">

                
        <button style="display: block; margin: 2rem 0" type="submit">Save</button>
    </form>


    <script>
        function previewImage(input) {
            var preview = document.getElementById('preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
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
</body>
</html>