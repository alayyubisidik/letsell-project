@extends('layout.main')

@section('title', '- Purchase')

@section('content')

    <h1>Sales</h1>

    @foreach ($sales as $sale)
        <div style="margin-top: 3rem">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between">
                    <div style="display: flex; gap: 1rem">
                        <p style="margin: 0">{{ $sale->orderItems[0]->product->store->name }}</p>
                        <a href="/store/{{ $sale->orderItems[0]->product->store->slug }}">View Store</a>
                    </div>
                    <div style="display: flex; gap: 2rem">
                        @if ($sale->status == 'unpaid')
                            <p style="margin: 0">Please come to the approved place to make payment</p>
                        @endif
                        @if ($sale->status == 'paid')
                            <p style="margin: 0">The order has been paid for and confirmed by the seller</p>
                        @endif
                        <p style="margin: 0">{{ $sale->status }}</p>
                    </div>
                </div>
                <div class="card-body" style="display: flex; gap: 1rem; flex-direction: column">
                    @foreach ($sale->orderItems as $orderItem)
                        <div style=" border-top: 1px solid gray; width: 100%; padding: .5rem;">
                            <div style="display: flex; justify-content: space-between">
                                <div style="display: flex; gap: 1rem">
                                    <img style="width: 10rem"
                                        src="{{ asset('/storage/product-image/' . $orderItem->product->productImages[0]->image) }}"
                                        alt="">
                                    <h5 class="card-title">{{ $orderItem->product->name }}</h5>
                                </div>

                                <div style="padding: 1rem; display: flex; align-items: center">
                                    <p style="font-size: large; font-weight: bold; "></p>
                                    <p style="margin: 0">Rp {{ number_format($orderItem->subtotal, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div style="padding: 1.5rem; border-top: 1px orange solid; background-color: #e2e8f0;">
                    <div style=" text-align: right;">
                        <p style="margin: 0">Order Total : Rp {{ number_format($sale->total, 0, ',', '.') }}</p>
                    </div>
                    @if ($sale->status == 'unpaid')
                        <button><a href="/sales/confirm-payment?order_id={{ $sale->id }}">Confirm</a></button>
                    @endif
                </div>
            </div>
        </div>
    @endforeach


    


@endsection
