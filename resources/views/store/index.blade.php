@extends('layout.main')

@section('title', '- Store')

@section('content')

<div style="background-color: #cbd5e1; display: flex; gap: 1rem">
    <div style="width: 30%;">
        <div style="display: flex; gap: 1rem;">
            <div style="border-radius: 50%; width: 40%; overflow: hidden;">
                <img style="width: 100%" src="{{ asset('storage/store-image/' . $store->image) }}" alt="">
            </div>
            <div>
                <h2>{{ $store->name }}</h2>
                @if (Auth::user())
                    @if (Auth::user()->role == 'seller' && Auth::user()->id == session('store')->user_id)
                        <a href="/dashboard-seller">Dashboard</a>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <div style="width: 70%; display: flex; flex-direction: column">
        <p>Products : {{ $store->products_count }}</p>
        <p>Rating : 4,9 (10000 penilaian)</p>
        <p>Joined : {{ $store->created_at->diffForHumans() }}</p>
    </div>
</div>

<div style="background-color: #cbd5e1;">
    <h2>Description</h2>
    <p>{{ $store->description }}</p>
</div>

<div style="background-color: #cbd5e1; display: flex; gap: 1rem">
    @foreach ($store->banners as $item)
        <img style="width: 40%" src="{{ asset('storage/banner-store/' . $item->image) }}" alt="">
    @endforeach
</div>

<div style="background-color: #cbd5e1;">
    <h2>Best Sell</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, tempora.</p>
</div>

<div style="background-color: #cbd5e1;">
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error doloribus explicabo sint impedit incidunt ab quia officia sequi consectetur nisi.</p>
</div>



@endsection