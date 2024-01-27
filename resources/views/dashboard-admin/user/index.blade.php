@extends('dashboard-admin.layout.main')

@section('title', '- User')

@section('content')
<!-- Start Content-->
<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manajemen User</li>
                    </ol>
                </div>
                <h4 class="page-title">Manajemen User</h4>
            </div>
        </div>
    </div>
    <!-- end page title --> 


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="header-title">Basic Data Table</h4> --}}

                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
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
                        </thead>
                    
                    
                        <tbody>
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
                                    <form action="/dashboard-admin/user/approve-the-user" method="post">
                                        @csrf
                                    
                                        <input type="hidden" name="status" value="{{ $user->status === 1 ? 0 : 1 }}">
                                        <input type="hidden" name="username" value="{{ $user->username }}">
                                    
                                        @if ($user->status === 1)
                                            <button class="btn btn-success" type="submit">Approved</button>
                                        @else
                                            <button class="btn btn-warning" type="submit">Disapproved</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>        
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
</div> <!-- container -->
    {{-- <h1>manajemen user</h1>

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
    </table> --}}
@endsection