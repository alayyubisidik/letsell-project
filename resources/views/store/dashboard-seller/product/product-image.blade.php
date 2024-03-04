@extends('store.dashboard-seller.layout.main')

@section('title', '- Product')


@section('content')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manajemen Image Product</li>
                    </ol>
                </div>
                <h4 class="page-title">Manajemen Image Product</h4>
            </div>
        </div>
    </div>
    <!-- end page title --> 


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="header-title">Basic Data Table</h4> --}}
                    <a href="/dashboard-seller/product-image/create/{{ $slug }}" class="btn btn-primary mb-3">Add New Image</a>

                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                            @foreach ($product->productImages as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img width="200" src="{{ asset('/storage/product-image/' . $item->image ) }}" alt="">
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="/dashboard-seller/product-image/edit/{{ $product->slug }}/{{ $item->id }}">Edit</a>
                                    <a class="btn btn-danger" href="/dashboard-seller/product-image/delete/{{ $item->id }}">Hapus</a>
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
@endsection
