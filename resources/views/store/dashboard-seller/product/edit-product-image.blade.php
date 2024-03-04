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
                        <li class="breadcrumb-item active">Manajemen Image Category</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Image Product</h4>
            </div>
        </div>
    </div>
    <!-- end page title --> 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="/dashboard-seller/product-image/edit/{{ $slug }}/{{ $productImage->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="image" onchange="previewImage(this)" class="form-control">
                                <img id="preview" src="{{  asset('/storage/product-image/' . $productImage->image) }}" alt="Preview" style=" max-width: 200px; margin-top: 10px;">        
                            </div>
                            @error('image')
                                <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <a href="{{ url('/dashboard-seller/product') }}" class="btn btn-secondary">Back</a>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
</div> <!-- container -->
    {{-- <h1>Edit Product Image</h1>

    <form action="/dashboard-seller/product-image/edit/{{ $slug }}/{{ $productImage->id }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="image" style="margin: 1rem 0 .3rem; display: block">Image</label>
        @error('image')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="file" name="image" id="image" onchange="previewImage(this)">
        <img id="preview" src="{{  asset('/storage/product-image/' . $productImage->image) }}" alt="Preview" style=" max-width: 200px; margin-top: 10px;">        

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
