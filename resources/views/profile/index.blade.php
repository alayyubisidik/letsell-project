<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>

    <img style="width: 10rem; border-radius: 50%" src="{{ asset('/storage/profile-picture/' . $user->profile_picture) }}" alt="Profile Picture">
    <p>{{ $user->name }}</p>
    <p>{{ $user->username }}</p>
    <p>{{ $user->contact }}</p>
    <p>{{ $user->nisn }}</p>

    <a href="/profile/edit">Edit Profile</a>

    <a href="/profile/change-password">Change Password</a>

</body>
</html>