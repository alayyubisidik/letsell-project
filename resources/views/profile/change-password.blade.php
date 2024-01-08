<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
</head>
<body>
    <h1>Change Password</h1>

    <form action="/profile/change-password" method="POST">
    
        @csrf

        <label style="margin: 1rem 0 .3rem; display: block" for="old_password">Old Password</label>
        @error('old_password')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        @if(session('message-error'))
            <p style="color: red; margin:0; font-size: 14px;">{{ session('message-error' )}}</p>
        @endif
        <input type="text" name="old_password" id="old_password">
        
        <label style="margin: 1rem 0 .3rem; display: block" for="new_password">New Password</label>
        @error('new_password')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="new_password" id="new_password">
        
        <label style="margin: 1rem 0 .3rem; display: block" for="confirm_password">Confirm Password</label>
        @error('confirm_password')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="confirm_password" id="confirm_password">
        
        <button style="display: block; margin: 2rem 0" type="submit">Save</button>
        
    </form>
</body>
</html>