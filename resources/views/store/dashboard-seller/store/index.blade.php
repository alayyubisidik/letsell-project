@extends('store.dashboard-seller.layout.main')

@section('title', '- Store')
    

@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Store Management</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card bg-primary">
                <div class="card-body profile-user-box">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-lg">
                                        <img src="{{ asset('/storage/store-image/' . $store->image) }}" alt="" class="rounded-circle img-thumbnail">
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <h4 class="mt-1 mb-1 text-white">{{ $store->name }}</h4>
                                        <p class="font-13 text-white-50"> Authorised Brand Seller</p>

                                        <ul class="mb-0 list-inline text-light">
                                            <li class="list-inline-item me-3">
                                                <h5 class="mb-1 text-white">$ 25,184</h5>
                                                <p class="mb-0 font-13 text-white-50">Total Revenue</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5 class="mb-1 text-white">5482</h5>
                                                <p class="mb-0 font-13 text-white-50">Number of Orders</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                <a href="/dashboard-seller/store/edit/{{ $store->slug }}" class="btn btn-light">
                                    <i class="mdi mdi-account-edit me-1"></i> Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Seller Information</h4>
                    <p class="text-muted font-13">
                        {{ $store->description }}
                    </p>
                    <hr/>
                    <div class="text-start">
                        <p class="text-muted"><strong>Full Name :</strong> <span class="ms-2">Nama Penjual</span></p>

                        <p class="text-muted"><strong>Mobile :</strong><span class="ms-2">0831 6466 6464</span></p>

                        <p class="text-muted"><strong>Email :</strong> <span class="ms-2">yummyslurp@gmail.com</span></p>

                        <p class="text-muted"><strong>Location :</strong> <span class="ms-2">{{ $store->locate }}</span></p>

                        <p class="text-muted mb-0" id="tooltip-container"><strong>Elsewhere :</strong>
                            <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="#" title="Facebook"><i class="mdi mdi-facebook"></i></a>
                            <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="#" title="Twitter"><i class="mdi mdi-twitter"></i></a>
                            <a class="d-inline-block ms-2 text-muted" data-bs-container="#tooltip-container" data-bs-placement="top" data-bs-toggle="tooltip" href="#" title="Skype"><i class="mdi mdi-skype"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card text-white bg-info overflow-hidden">
                <div class="card-body">
                    <div class="toll-free-box text-center">
                        <h4> <i class="mdi mdi-deskphone"></i> Toll Free : 1-234-567-8901</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Orders & Revenue</h4>
                    <div dir="ltr">
                        <div style="height: 260px;" class="chartjs-chart">
                            <canvas id="high-performing-product"></canvas>
                        </div>
                    </div>        
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class="dripicons-basket float-end text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Orders</h6>
                            <h2 class="m-b-20">1,587</h2>
                            <span class="badge bg-primary"> +11% </span> <span class="text-muted">From previous period</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class="dripicons-box float-end text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Revenue</h6>
                            <h2 class="m-b-20">$<span>46,782</span></h2>
                            <span class="badge bg-danger"> -29% </span> <span class="text-muted">From previous period</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class="dripicons-jewel float-end text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Product Sold</h6>
                            <h2 class="m-b-20">1,890</h2>
                            <span class="badge bg-primary"> +89% </span> <span class="text-muted">Last year</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Create Banner for Promotion</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Banner</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($store->banners as $banner)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('/storage/banner-store/' . $banner->image) }}" alt="Preview" height="100">
                                    </td>
                                    <td>
                                        <a href="/dashboard-seller/store/banner/edit?banner_id={{ $banner->id }}" class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip" href="#" title="Edit Banner"><i class="uil-image-edit"></i></a>
                                        <a href="/dashboard-seller/store/banner/delete?banner_id={{ $banner->id }}" class="btn btn-danger" data-bs-placement="top" data-bs-toggle="tooltip" href="#" title="Delete Banner"><i class="uil-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <form action="/dashboard-seller/store/banner" method="POST" enctype="multipart/form-data">
                                @csrf
                                <tr>
                                    <td>
                                        {{-- <label for="banner">Banner</label> --}}
                                        <input type="file" name="banner" id="banner"  onchange="previewImage(this)">
                                    </td>
                                    <td>
                                        <img id="preview" src="#" alt="Preview" style="display: none;" height="100">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </td>
                                </tr>
                                </form>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- <h1>Store Manajamen</h1>

    <h1>{{ $store->name }}</h1>
    <p>{{ $store->description }}</p>
    <p>{{ $store->locate }}</p>
    <img width="200" src="{{ asset('/storage/store-image/' . $store->image) }}" alt="">

    <a href="/dashboard-seller/store/edit/{{ $store->slug }}">Edit</a>

    <h3>Banner</h3>

    <table>
        <tr>

            <th>NO</th>
            <th>Banner</th>
            <th>Action</th>
        </tr>
        @foreach ($store->banners as $banner)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img  src="{{  asset('/storage/banner-store/' . $banner->image) }}" alt="Preview" style=" max-width: 200px; margin:0px;">
                </td>
                <td>
                    <a href="/dashboard-seller/store/banner/delete?banner_id={{ $banner->id }}">Hapus</a>
                    <a href="/dashboard-seller/store/banner/edit?banner_id={{ $banner->id }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Create banner for promotion</h3>

    @if (session('message-success'))
        <h2>{{ session('message-success') }}</h2>
    @endif

    <form action="/dashboard-seller/store/banner" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="banner">Banner</label>
        <input type="file" name="banner" id="banner"  onchange="previewImage(this)">
        <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">

        <button type="submit">Save</button>
    </form> --}}

    <script>
        function previewImage(input) {
            var preview = document.getElementById('preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
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

@endsection