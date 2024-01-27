@extends('layout.main')

@section('title', '- Purchase')

@section('content')

    <h1>Purchase</h1>

    @foreach ($purchases as $purchase)
        <div style="margin-top: 3rem">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between">
                    <div style="display: flex; gap: 1rem">
                        <p style="margin: 0">{{ $purchase->orderItems[0]->product->store->name }}</p>
                        <a href="/store/{{ $purchase->orderItems[0]->product->store->slug }}">View Store</a>
                    </div>
                    <div style="display: flex; gap: 2rem">
                        @if ($purchase->status == 'unpaid')
                            <p style="margin: 0">Please come to the approved place to make payment</p>
                        @endif
                        @if ($purchase->status == 'paid')
                            <p style="margin: 0">The order has been paid for and confirmed by the seller</p>
                        @endif
                        @if ($purchase->status == 'canceled')
                            <p style="margin: 0">Order cancelled</p>
                        @endif
                        <p style="margin: 0">{{ $purchase->status }}</p>
                    </div>
                </div>
                <div class="card-body" style="display: flex; gap: 1rem; flex-direction: column">
                    @foreach ($purchase->orderItems as $orderItem)
                        <div style=" border-top: 1px solid gray; width: 100%; padding: .5rem;">
                            <div style="display: flex; justify-content: space-between">
                                <div style="display: flex; gap: 1rem">
                                    <img style="width: 10rem" src="{{ asset('/storage/product-image/' . $orderItem->product->productImages[0]->image) }}" alt="">
                                    <div class="">
                                        <h5 class="card-title">{{ $orderItem->product->name }}</h5>
                                        @if ($purchase->status == 'paid')
                                            @if ($orderItem->is_rated == 0)
                                                <button >
                                                    <a href="/rating?order_item_id={{ $orderItem->id }}&product_id={{ $orderItem->product_id }}">Rating</a>
                                                </button>                
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <div style="padding: 1rem; display: flex; align-items: center">
                                    <p style="font-size: large; font-weight: bold; "></p>
                                    <p style="margin: 0">Rp {{ number_format($orderItem->subtotal , 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>

                <div style="padding: 1.5rem; border-top: 1px orange solid; background-color: #e2e8f0;">
                    @if ($purchase->status == 'unpaid')
                        <a href="/purchase/cancel?order_id={{ $purchase->id }}" onclick="return confirm('yakin lu?')">Cancel</a>            
                    @endif
                    <div style="display: flex; justify-content: space-between">
                        @if ($purchase->status == 'unpaid')
                            <p>{{ $purchase->created_at->diffForHumans() }} (After 24 hours, if payment has not been confirmed, the order will automatically be cancelled)</p>
                        @endif
                        <p style="margin: 0">Order Total : Rp {{ number_format($purchase->total , 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    
    
@endsection
