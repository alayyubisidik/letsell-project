@extends('layout.main')

@section('title', '- Rating')

@section('content')

    <h2>Rating and review for {{ $product->name }} from {{ $product->store->name }}</h2>

    <form action="/rating/create" method="POST">
        @csrf

        <p>Rating</p>
        <div class="wrapper">
            <input type="radio" name="rating" id="st1" value="1" />
            <input type="radio" name="rating" id="st2" value="2" />
            <input type="radio" name="rating" id="st3" value="3" />
            <input type="radio" name="rating" id="st4" value="4" />
            <input type="radio" name="rating" id="st5" value="5" />
        </div>

        <div class="form-group">
            <label for="review" style="margin: .3rem 0; font-size: 15px; font-weight: bold; color: #000;">Review</label>
            <input type="text" class="form-control" name="review" id="review">
        </div>

        <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}">
        <input type="hidden" class="form-control" name="order_item_id" value="{{ request('order_item_id') }}">    
        
        <button type="submit">Send</button>
    </form>


    
    
@endsection
