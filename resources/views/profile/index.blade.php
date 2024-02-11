@extends('layout.main')

@section('title', '- Profile')

@section('content')
<section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="p-6 d-flex justify-content-between align-items-center d-md-none">
            <h3 class="fs-5 mb-0">Account Setting</h3>
            <button class="btn btn-outline-gray-400 text-muted d-md-none" type="button" data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasAccount" aria-controls="offcanvasAccount">
              <i class="feather-icon icon-menu"></i>
            </button>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-12 border-end  d-none d-md-block">
          <div class="pt-10 pe-lg-10">
            <ul class="nav flex-column nav-pills nav-pills-dark">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="/purchase"><i
                    class="feather-icon icon-shopping-bag me-2"></i>Your Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="account-settings.html"><i
                    class="feather-icon icon-settings me-2"></i>Settings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="account-address.html"><i
                    class="feather-icon icon-map-pin me-2"></i>Address</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="account-payment-method.html"><i
                    class="feather-icon icon-credit-card me-2"></i>Payment Method</a>
              </li>
              <li class="nav-item">
                <hr>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/logout"><i class="feather-icon icon-log-out me-2"></i>Log out</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-12">
          <div class="p-6 p-lg-10">
            <div class="mb-6">
              <h2 class="mb-0">Account Setting</h2>
            </div>
            <div>
              <h5 class="mb-4">Account details</h5>
              <div class="row">
                <div class="col-lg-5">
                  <form action="/profile/edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">NIS</label>
                      @error('nis')
                        <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                      @enderror
                      <input type="number" disabled class="form-control" value="{{ $user->nis }}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                        @error('name')
                          <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                      <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        @error('username')
                          <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                        <input name="username" type="text" class="form-control" value="{{ $user->username }}">
                      </div>
                    <div class="mb-5">
                      <label class="form-label">Contact</label>
                      @error('contact')
                        <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                      @enderror
                      <input name="contact" type="number" class="form-control" value="{{ $user->contact }}">
                    </div>
                    <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Save Details</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <hr class="my-10">
            <div class="pe-lg-14">
              <h5 class="mb-4">Password</h5>
              <form action="/profile/change-password" method="POST" class=" row row-cols-1 row-cols-lg-2">
                @csrf
                <div class="mb-3 col-lg-12">
                  <label class="form-label">Old Password</label>
                  @error('old_password')
                    <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                  @enderror
                  @if(session('message-error'))
                    <p style="color: red; margin:0; font-size: 14px;">{{ session('message-error' )}}</p>
                  @endif
                  <input type="password" name="old_password" id="old_password" class="form-control" placeholder="**********">
                </div>
                <div class="mb-3 col">
                  <label class="form-label">New Password</label>
                  @error('new_password')
                    <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                  @enderror
                  <input type="password" name="new_password" id="new_password" class="form-control" placeholder="**********">
                </div>
                <div class="mb-3 col">
                  <label class="form-label">Confirm Password</label>
                  @error('confirm_password')
                    <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                  @enderror
                  <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="**********">
                </div>
                <div class="col-12">
                  <p class="mb-4">Can’t remember your current password?<a href="#"> Reset your password.</a></p>
                  <button type="submit" class="btn btn-primary">Save Password</button>
                </div>
              </form>
            </div>
            <hr class="my-10">
            <div>
              <h5 class="mb-4">Delete Account</h5>
              <p class="mb-2">Would you like to delete your account?</p>
              <p class="mb-5">This account contain 12 orders, Deleting your account will remove all the order details
                associated with it.</p>
              <a href="#" class="btn btn-outline-danger">I want to delete my account</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasAccount" aria-labelledby="offcanvasAccountLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasAccountLabel">Profile</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="nav flex-column nav-pills nav-pills-dark">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="account-orders.html"><i
              class="feather-icon icon-shopping-bag me-2"></i>Your Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="account-settings.html"><i
              class="feather-icon icon-settings me-2"></i>Settings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="account-address.html"><i class="feather-icon icon-map-pin me-2"></i>Address</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="account-payment-method.html"><i
              class="feather-icon icon-credit-card me-2"></i>Payment Method</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="account-notification.html"><i
              class="feather-icon icon-bell me-2"></i>Notification</a>
        </li>
      </ul>
      <hr class="my-6">
      <div>
        <ul class="nav flex-column nav-pills nav-pills-dark">
          <li class="nav-item">
            <a class="nav-link " href="/logout"><i class="feather-icon icon-log-out me-2"></i>Log out</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
@endsection


{{-- <!DOCTYPE html>
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
</html> --}}