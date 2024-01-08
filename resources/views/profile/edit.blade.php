<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
</head>
<body>
    <h1>Profile Edit</h1>

    <form action="/profile/edit" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="" style="position: relative; display: inline-block">
            <img id="preview" style="width: 10rem; border-radius: 50%" src="{{ asset('/storage/profile-picture/' . $user->profile_picture) }}" alt="Profile Picture">
            <button style="position: absolute; bottom : 0; left : 3rem; background-color: blue; color: white;">Change Image</button>
            <input type="file" name="profile_picture" id="profilePicture" onchange="previewImage(this)" style="position: absolute; bottom : 0; left:3rem; opacity: 0;">
        </div>


        <label style="margin: 1rem 0 .3rem; display: block" for="name">Name</label>
        @error('name')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="name" id="name" value="{{ $user->name }}">
        
        <label style="margin: 1rem 0 .3rem; display: block" for="contact">Contact</label>
        @error('contact')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="number" name="contact" id="contact" value="{{ $user->contact }}">
        
        <label style="margin: 1rem 0 .3rem; display: block" for="nisn">NISN</label>
        @error('nisn')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="number" name="nisn" id="nisn" value="{{ $user->nisn }}">
        
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