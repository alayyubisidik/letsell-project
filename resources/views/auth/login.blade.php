{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    @if (session('message-error'))
        <p style="color: red; margin:0; font-size: 14px;">{{ session('message-error') }}</p>
    @endif

    <form action="/login" method="POST">

        @csrf

        <label style="margin: 1rem 0 .3rem; display: block" for="username">Username</label>
        @error('username')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="username" id="username" value="{{ old('username') }}" >
        
        <label style="margin: 1rem 0 .3rem; display: block" for="password">Password</label>
        @error('password')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="password" name="password" id="password"> 

        <button type="submit" style="display: block; margin: 2rem 0">Login</button>

    </form>

    <a href="/register">Register</a>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <title>FreshCart - eCommerce HTML Template</title>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="FreshCart is a beautiful eCommerce HTML template specially designed for multipurpose shops & online stores selling products. Most Loved by Developers to build a store website easily.">
    <meta content="Codescandy" name="author" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico') }}">

    <!-- Libs CSS -->
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/feather-webfont/dist/feather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/slick-carousel/slick/slick.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/slick-carousel/slick/slick-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/nouislider/dist/nouislider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/prismjs/themes/prism-okaidia.min.css') }}" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
</head>

<body>
    <!-- navigation -->
    <div class="border-bottom shadow-sm">
    <nav class="navbar navbar-light py-2">
        <div class="container justify-content-center justify-content-lg-between">
        <a class="navbar-brand" href="/">
            <img src="../assets/images/logo/freshcart-logo.svg" alt="" class="d-inline-block align-text-top">
        </a>
        <span class="navbar-text">
            Already have an account? <a href="/login">Sign in</a>
        </span>
        </div>
    </nav>
    </div>

    <!-- section -->
    <section class="my-lg-14 my-8">
        <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                <img src="../assets/images/svg-graphics/signin-g.svg" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
            <div class="mb-lg-9 mb-5">
                <h1 class="mb-1 h2 fw-bold">Sign in to FreshCart</h1>
                <p>Welcome back to FreshCart! Enter your email to get started.</p>
            </div>
            <form action="/login" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <input type="text" name="username" class="form-control" id="inputEmail4" placeholder="Username" required>
                    </div>
                    <div class="col-12">
                        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember me
                        </label>
                        </div>
                        <div> Forgot password? <a href="forgot-password.html">Reset It</a></div>
                    </div>
                    <div class="col-12 d-grid">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                    <div>Don’t have an account? <a href="/register"> Sign Up</a></div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </section>

    @include('layout.footer')

    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-countdown/dist/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/libs/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/nouislider/dist/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/libs/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('assets/libs/rater-js/index.js') }}"></script>
    <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/libs/prismjs/components/prism-scss.min.js') }}"></script>
    <script src="{{ asset('assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/dist/flatpickr.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>

</body>
</html>