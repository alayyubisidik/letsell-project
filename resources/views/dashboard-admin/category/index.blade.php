@extends('dashboard-admin.layout.main')

@section('title', '- Category')

@section('content')
<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manajemen Category</li>
                    </ol>
                </div>
                <h4 class="page-title">Manajemen Category</h4>
            </div>
        </div>
    </div>
    <!-- end page title --> 


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="header-title">Basic Data Table</h4> --}}
                    <a href="/dashboard-admin/category/create" class="btn btn-primary mb-3">Create New Category</a>

                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Product Count</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->products_count }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>        
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
</div> <!-- container -->
    {{-- <h1>Category Manajemen</h1>

    <a href="/dashboard-admin/category/create">Create a new Category</a>

    <table cellpadding="10">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Product Count</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->products_count }}</td>
            </tr>
        @endforeach
    </table> --}}
@endsection