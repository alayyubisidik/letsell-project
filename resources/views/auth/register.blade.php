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
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">

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

    <section class="my-lg-14 my-8">
        <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                <img src="../assets/images/svg-graphics/signup-g.svg" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                <div class="mb-lg-9 mb-5">
                    <h1 class="mb-1 h2 fw-bold">Get Start Shopping</h1>
                    <p>Welcome to FreshCart! Enter your email to get started.</p>
                </div>

                <form action="/register" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="text" name="name" class="form-control" placeholder="name" required>
                        </div>
                        <div class="col-12">
                            <input type="text" name="username" class="form-control" placeholder="username" required>
                        </div>
                        <div class="col-12">
                            <input type="password" name="password" class="form-control" placeholder="password" required>
                        </div>
                        <div class="col-12">
                            <input type="number" name="contact" class="form-control" placeholder="contact" required>
                        </div>
                        <div class="col-12">
                            <input type="number" name="NIS" class="form-control" placeholder="NIS" required>
                        </div>
                        <div class="col-12">
                            <input type="file" name="profile_picture" class="form-control" onchange="previewImage(this)">
                        </div>
                        <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">
                        <div class="col-12 d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        <p><small>By continuing, you agree to our <a href="#!"> Terms of Service</a> & <a href="#!">PrivacyPolicy</a></small></p>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>

    @include('layout.footer')

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

{{-- <!DOCTYPE html>
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
</html> --}}