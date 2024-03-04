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
                    <form action="/dashboard-admin/category/create" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            @error('name')
                                <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="image" class="form-control" onchange="previewImage(this)">
                            </div>
                            @error('image')
                                <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <img id="preview" src="" alt="Preview" style=" display: none; max-width: 200px; margin-top: 10px;">   
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <a href="{{ url('/dashboard-admin/category') }}" class="btn btn-secondary">Back</a>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
</div> <!-- container -->
    {{-- <h1>Create Category</h1>

    <form action="/dashboard-admin/category/create" method="POST" enctype="multipart/form-data">
        @csrf

        <label style="margin: 1rem 0 .3rem; display: block" for="name">Name</label>
        @error('name')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="name" id="name" >

        <label for="image" style="margin: 1rem 0 .3rem; display: block">Image</label>
        @error('image')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="file" name="image" id="image" onchange="previewImage(this)">
        <img id="preview" src="" alt="Preview" style=" display: none; max-width: 200px; margin-top: 10px;">        

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