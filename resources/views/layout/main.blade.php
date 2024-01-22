{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Letsell @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="padding: 5rem 10%">
    <div class="" style="display: flex; position: fixed; z-index: 99; top: 0; left: 0; right: 0; justify-content: space-between; background-color: #aaa; align-items: center; padding: .3rem 10%;">
        <div class="">Navbar</div>
        
        <form action="/product" method="GET">
            <div class="input-group mb-3" style="width: 30rem">
                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search by product name, category and store" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>

        <ul style="display: flex; list-style: none; gap: 4rem">
            <li>
                <a href="/product">Product</a>
            </li>
            @if (!Auth::user())
                <li>
                    <a href="/login">Login</a>
                </li>
                @else
                <li>
                    <a href="/logout">Logout</a>
                </li>
            @endif
            @if (Auth::user() && Auth::user()->role == 'customer')
                <li>
                    <a href="/store-create">Start Selling</a>
                </li>
                <li>
                    <a href="/profile">Profile</a>
                </li>
            @endif
            @if (Auth::user() && Auth::user()->role == 'seller')
                <li>
                    <a href="/store/{{ session('store')->slug }}">My Store</a>
                </li>
                <li>
                    <a href="/profile">Profile</a>
                </li>
            @endif
        </ul>
    </div>

    <div class="" style="">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <title>FreshCart - eCommerce HTML Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="FreshCart is a beautiful eCommerce HTML template specially designed for multipurpose shops & online stores selling products. Most Loved by Developers to build a store website easily.">
    <meta content="Codescandy" name="author" />
<!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon.ico">

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
@include('layout.navbar')




<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Sign Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="fullName" class="form-label">Name</label>
            <input type="text" class="form-control" id="fullName" placeholder="Enter Your Name" required="">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email address" required="">
          </div>
          <div class="mb-5">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password" required="">
            <small class="form-text">By Signup, you agree to our <a href="#!">Terms of Service</a> & <a
                href="#!">Privacy Policy</a></small>
          </div>
          <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
      </div>
      <div class="modal-footer border-0 justify-content-center">
        Already have an account? <a href="#">Sign in</a>
      </div>
    </div>
  </div>
</div>



<!-- Shop Cart -->

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header border-bottom">
    <div class="text-start">
      <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
      <small>Location in 382480</small>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">

    <div class="alert alert-danger" role="alert">
      You’ve got FREE delivery. Start checkout now!
    </div>
    <div>
      <div class="py-3">
        <ul class="list-group list-group-flush">
          <li class="list-group-item py-3 px-0 border-top">
            <div class="row align-items-center">
              <div class="col-2">
                <img src="assets/images/products/product-img-1.jpg" alt="Ecommerce" class="img-fluid"></div>
              <div class="col-5">
                <h6 class="mb-0">Organic Banana</h6>
                <span><small class="text-muted">.98 / lb</small></span>
                <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-trash-2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                      </svg></span>Remove</a></div>
              </div>
              <div class="col-3">
                <div class="input-group  flex-nowrap justify-content-center  ">
                  <input type="button" value="-"
                    class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                    data-field="quantity">
                  <input type="number" step="1" max="10" value="1" name="quantity"
                    class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                  <input type="button" value="+"
                    class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                    data-field="quantity">
                </div>
              </div>
              <div class="col-2 text-end">
                <span class="fw-bold">$35.00</span>

              </div>
            </div>
          </li>
          <li class="list-group-item py-3 px-0">
            <div class="row row align-items-center">
              <div class="col-2">
                <img src="assets/images/products/product-img-2.jpg" alt="Ecommerce" class="img-fluid"></div>
              <div class="col-5">
                <h6 class="mb-0">Fresh Garlic, 250g</h6>
                <span><small class="text-muted">250g</small></span>
                <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-trash-2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                      </svg></span>Remove</a></div>
              </div>
              <div class="col-3">
                <div class="input-group  flex-nowrap justify-content-center  ">
                  <input type="button" value="-"
                    class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                    data-field="quantity">
                  <input type="number" step="1" max="10" value="1" name="quantity"
                    class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                  <input type="button" value="+"
                    class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                    data-field="quantity">
                </div>
              </div>
              <div class="col-2 text-end">
                <span class="fw-bold">$20.97</span>
                <span class="text-decoration-line-through text-muted small">$26.97</span>
              </div>
            </div>
          </li>
          <li class="list-group-item py-3 px-0">
            <div class="row row align-items-center">
              <div class="col-2">
                <img src="assets/images/products/product-img-3.jpg" alt="Ecommerce" class="img-fluid"></div>
              <div class="col-5">
                <h6 class="mb-0">Fresh Onion, 1kg</h6>
                <span><small class="text-muted">1 kg</small></span>
                <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-trash-2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                      </svg></span>Remove</a></div>
              </div>
              <div class="col-3">
                <div class="input-group  flex-nowrap justify-content-center  ">
                  <input type="button" value="-"
                    class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                    data-field="quantity">
                  <input type="number" step="1" max="10" value="1" name="quantity"
                    class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                  <input type="button" value="+"
                    class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                    data-field="quantity">
                </div>
              </div>
              <div class="col-2 text-end">
                <span class="fw-bold">$25.00</span>
                <span class="text-decoration-line-through text-muted small">$45.00</span>
              </div>
            </div>
          </li>
          <li class="list-group-item py-3 px-0">
            <div class="row row align-items-center">
              <div class="col-2">
                <img src="assets/images/products/product-img-4.jpg" alt="Ecommerce" class="img-fluid"></div>
              <div class="col-5">
                <h6 class="mb-0">Fresh Ginger</h6>
                <span><small class="text-muted">250g</small></span>
                <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-trash-2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                      </svg></span>Remove</a></div>
              </div>
              <div class="col-3">
                <div class="input-group  flex-nowrap justify-content-center  ">
                  <input type="button" value="-"
                    class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                    data-field="quantity">
                  <input type="number" step="1" max="10" value="1" name="quantity"
                    class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                  <input type="button" value="+"
                    class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                    data-field="quantity">
                </div>
              </div>
              <div class="col-2 text-end">
                <span class="fw-bold">$39.87</span>
                <span class="text-decoration-line-through text-muted small">$45.00</span>
              </div>
            </div>
          </li>
          <li class="list-group-item py-3 px-0 border-bottom">
            <div class="row row align-items-center">
              <div class="col-2">
                <img src="assets/images/products/product-img-5.jpg" alt="Ecommerce" class="img-fluid"></div>
              <div class="col-5">
                <h6 class="mb-0">Apple Royal Gala, 4 Pieces Box</h6>
                <span><small class="text-muted">4 Apple</small></span>
                <div class="mt-2 small"> <a href="#!" class="text-decoration-none"> <span class="me-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-trash-2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                      </svg></span>Remove</a></div>
              </div>
              <div class="col-3">
                <div class="input-group  flex-nowrap justify-content-center  ">
                  <input type="button" value="-"
                    class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                    data-field="quantity">
                  <input type="number" step="1" max="10" value="1" name="quantity"
                    class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                  <input type="button" value="+"
                    class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                    data-field="quantity">
                </div>
              </div>
              <div class="col-2 text-end">
                <span class="fw-bold">$39.87</span>
                <span class="text-decoration-line-through text-muted small">$45.00</span>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="d-grid">
        <button class="btn btn-primary btn-lg d-flex justify-content-between align-items-center" type="submit"> Go to
          Checkout <span class="fw-bold">$120.00</span></button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-6">
        <div class="d-flex justify-content-between align-items-start ">
          <div>
            <h5 class="mb-1" id="locationModalLabel">Choose your Delivery Location</h5>
            <p class="mb-0 small">Enter your address and we will specify the offer you area. </p>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="my-5">
          <input type="search" class="form-control" placeholder="Search your area">
        </div>
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h6 class="mb-0">Select Location</h6>
          <a href="#" class="btn btn-outline-gray-400 text-muted btn-sm">Clear All</a>
        </div>
        <div>
          <div data-simplebar style="height:300px;">
            <div class="list-group list-group-flush">
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action active">
                <span>Alabama</span><span>Min:$20</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>Alaska</span><span>Min:$30</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>Arizona</span><span>Min:$50</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>California</span><span>Min:$29</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>Colorado</span><span>Min:$80</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>Florida</span><span>Min:$90</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>Arizona</span><span>Min:$50</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>California</span><span>Min:$29</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>Colorado</span><span>Min:$80</span></a>
              <a href="#"
                class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                <span>Florida</span><span>Min:$90</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@yield('content')

@include('layout.footer')

  <!-- Javascript-->
  <!-- Libs JS -->
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


<!-- Mirrored from freshcart.codescandy.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Aug 2022 17:45:56 GMT -->
</html>