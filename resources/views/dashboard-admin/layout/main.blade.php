<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard | Lettsell</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}">

        <!-- third party css -->
        <link href="{{ asset('admin/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/vendor/fixedHeader.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/vendor/fixedColumns.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>

    </head>

    <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
        <!-- Begin page -->
        <div class="wrapper">
            @include('dashboard-admin.layout.sidebar')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    @include('dashboard-admin.layout.navbar')
                    
                    @yield('content')

                </div>
                <!-- content -->

                @include('dashboard-admin.layout.footer')

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                    </div>

                    <!-- Settings -->
                    <h5 class="mt-3">Color Scheme</h5>
                    <hr class="mt-1" />

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>
       

                    <!-- Width -->
                    <h5 class="mt-4">Width</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                        <label class="form-check-label" for="fluid-check">Fluid</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                        <label class="form-check-label" for="boxed-check">Boxed</label>
                    </div>
        

                    <!-- Left Sidebar-->
                    <h5 class="mt-4">Left Sidebar</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                        <label class="form-check-label" for="default-check">Default</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                        <label class="form-check-label" for="condensed-check">Condensed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
            
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                    </div>
                </div> <!-- end padding-->

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script src="{{ asset('admin/js/vendor.min.js') }}"></script>
        <script src="{{ asset('admin/js/app.min.js') }}"></script>

        <!-- third party js -->
        <script src="{{ asset('admin/js/vendor/apexcharts.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>

        <script src="{{ asset('admin/js/vendor/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/dataTables.bootstrap5.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/responsive.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/buttons.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/buttons.print.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/fixedColumns.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('admin/js/vendor/fixedHeader.bootstrap5.min.js') }}"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="{{ asset('admin/js/pages/demo.dashboard.js') }}"></script>
        <script src="{{ asset('admin/js/pages/demo.datatable-init.js') }}"></script>
        <!-- end demo js-->
    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:20:07 GMT -->
</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard @yield('title')</title>
</head>
<body>
    <div class="" style="display: flex; gap: 2rem">
        <div class="" style="background-color: #aaa; width: 20%;">
            <u style="display:flex; flex-direction: column; gap: 2rem">
                <li>
                    <a href="/dashboard-admin">Dashboard</a>
                </li>
                <li>
                    <a href="/dashboard-admin/user">User</a>
                </li>
                <li>
                    <a href="/dashboard-admin/product">Product</a>
                </li>
                <li>
                    <a href="/dashboard-admin/category">Category</a>
                </li>
            </u>
        </div>
    
        <div class="" style="width: 80%; min-height: 100vh; background-color: #ddd;">
            @yield('content')
        </div>
    </div>

</body>
</html> --}}