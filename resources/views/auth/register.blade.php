<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <form action="/register" method="POST" enctype="multipart/form-data">

        @csrf

        <label style="margin: 1rem 0 .3rem; display: block" for="name">Name</label>
        @error('name')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        
        <label style="margin: 1rem 0 .3rem; display: block" for="username">Username</label>
        @error('username')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="username" id="username" value="{{ old('username') }}">
        
        <label style="margin: 1rem 0 .3rem; display: block" for="password">Password</label>
        @error('password')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="password" name="password" id="password"> 
        
        <label style="margin: 1rem 0 .3rem; display: block" for="contact">Contact</label>
        @error('contact')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="number" name="contact" id="contact" value="{{ old('contact') }}">
        
        <label style="margin: 1rem 0 .3rem; display: block" for="nis">NIS</label>
        @error('nisn')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="number" name="nis" d="nis" value="{{ old('nis') }}">
        
        <label style="margin: 1rem 0 .3rem; display: block" for="profilePicture">Profile Picture</label>
        @error('profile_picture')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="file" id="profilePicture" name="profile_picture" onchange="previewImage(this)">

        <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">

        <button type="submit" style="display: block; margin: 2rem 0">Register</button>

    </form>

    <a href="/login">Login</a>


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