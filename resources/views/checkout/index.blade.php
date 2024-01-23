@extends('layout.main')

@section('title', '- Checkout')

@section('content')

<h1>Checkout</h1>

<div style="background-color: #cbd5e1; margin-top: 3rem; padding: 1rem">
    <p>Place of payment</p>

    <form id="checkoutForm" action="/checkout/order?order_id={{ $order->id }}" method="POST">
        @csrf
        <input style="width: 100%" name="place_of_payment" required>
    </form>
</div>

<div style="background-color: #cbd5e1; margin-top: 2rem; padding: 1rem">
    <div style="display: flex; ">
        <p style="width: 25%">Product Ordered</p>
        <p style="width: 25%">Unit Price</p>
        <p style="width: 25%">Amount</p>
        <p style="width: 25%">Total</p>
    </div>

    @foreach ($order->orderItems as $item)
        <div style="display: flex; margin-top: 1rem;">
            <div style="width: 25%">
                <p>{{ $item->product->store->name }}</p>
                <img style="width: 10rem" src="{{ asset('storage/product-image/' . $item->product->productImages[0]->image) }}" alt="">

                <p>{{ $item->product->name }}</p>
            </div>

            <div style="width: 25%">
                <p style="font-size: large; font-weight: bold; color: orange">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
            </div>

            <div style="width: 25%">
                <p>{{ $item->quantity }}</p>
            </div>

            <div style="width: 25%">
                <div style="width: 20%; text-align: center;">
                    <p style=" font-weight: bold;">Rp {{ number_format($item->quantity * $item->product->price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    @endforeach

</div>

<div style="background-color: #cbd5e1; margin-top: 2rem; padding: 1rem">
    <p>Payment Method</p>

    COD
</div>

<div style="background-color: #cbd5e1; margin-top: 2rem; padding: 1rem; ">

    {{-- <p style="text-align: right; ">Total Payment :
        <p style=" font-weight: bold; text-align: right">Rp {{ number_format($cartItem->quantity * $cartItem->product->price, 0, ',', '.') }}</p>
    </p> --}}

    <div style="width: 100%; display: flex; justify-content: space-between">
        <p>By clicking “Place Order”, I agree to the Product Protection's Terms & Conditions.</p>
        <button id="placeOrderButton">Place Order</button>
    </div>
</div>

<script>
    // Menangani pengiriman formulir ketika tombol "Place Order" diklik
    document.getElementById('placeOrderButton').addEventListener('click', function () {
        // Mendapatkan nilai dari input place_of_payment
        var placeOfPaymentInput = document.getElementsByName('place_of_payment')[0].value;

        // Memastikan bahwa input tidak kosong sebelum mengirimkan formulir
        if (placeOfPaymentInput.trim() === '') {
            alert('Place of payment cannot be empty.');
        } else {
            // Jika input tidak kosong, submit formulir
            document.getElementById('checkoutForm').submit();
        }
    });
</script>


@endsection
