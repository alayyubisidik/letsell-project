@extends('dashboard.layout.main')

@section('title', '- User')

@section('content')
    <h1>manajemen user</h1>

    <style>
        td, th{
            padding: 1rem
        }
    </style>

    <table>
        <tr>
            <th>No</th>
            <th>Profile Picture</th>
            <th>Name</th>
            <th>Username</th>
            <th>Contact</th>
            <th>NISN</th>
            <th>Role</th>
            <th>Status</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img style="width: 10rem" src="{{ asset('/storage/profile-picture/' . $user->profile_picture) }}" alt="">
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->contact }}</td>
                <td>{{ $user->nisn }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <form action="/dashboard/user/approve-the-user" method="post">
                        @csrf
                    
                        <input type="hidden" name="status" value="{{ $user->status === 1 ? 0 : 1 }}">
                        <input type="hidden" name="username" value="{{ $user->username }}">
                    
                        @if ($user->status === 1)
                            <button style="background-color: green; color: white" type="submit">Approved</button>
                        @else
                            <button style="background-color: red; color: white" type="submit">Disapproved</button>
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection