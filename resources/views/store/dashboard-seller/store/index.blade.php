@extends('store.dashboard-seller.layout.main')

@section('title', '- Store')
    

@section('content')
    <h1>Store Manajamen</h1>

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
    </form>

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