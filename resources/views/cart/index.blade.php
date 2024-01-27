@extends('layout.main')

@section('title', '- Cart')

@section('content')

    <h1>Shooping Cart</h1>


    <form action="/checkout" method="POST">
        @csrf
        <div style="padding-bottom: 10rem;">
            <div
                style="background-color: #cbd5e1; display: flex; justify-content: space-around; margin-top: 3rem; padding: 1rem">
                <p>Product</p>
                <p>Unit Price</p>
                <p>Quantity</p>
                <p>Total Price</p>
                <p>Action</p>
            </div>

            @foreach ($cartItems as $index => $item)
                <div style="display: flex; gap: 1rem">
                    {{-- <input type="checkbox" name="selected_items[{{ $index }}][id]" value="{{ $item->id }}" id="checkbox_{{ $index }}" onchange="calculateTotal()"> --}}
                    <input type="checkbox" name="selected_items[{{ $index }}][id]" value="{{ $item->id }}"
                        id="checkbox_{{ $index }}" onchange="calculateTotal()">
                    <div
                        style="background-color: #cbd5e1; display: flex; justify-content: center; margin-top: 1rem; padding: 1rem">
                        <div style="display: flex; gap: 1rem; width: 20%; justify-content: center">
                            <img style="width: 50%"
                                src="{{ asset('storage/product-image/' . $item->product->productImages[0]->image) }}"
                                alt="">
                            <p>{{ $item->product->store->name }}</p>
                            <p>{{ $item->product->name }}</p>
                        </div>

                        <p style="font-size: large; text-align: center; width: 20%; font-weight: bold; "
                            id="price_{{ $index }}" data-price="{{ $item->product->price }}">Rp
                            {{ number_format($item->product->price, 0, ',', '.') }}</p>

                        <div style="display: flex; justify-content: center; width: 20%">
                            @if (session('message-error'))
                                <p style="color: red; font-size: small;">{{ session('message-error') }}</p>
                            @endif
                            @if (session('message-success'))
                                <p style="color: green; font-size: small;">{{ session('message-success') }}</p>
                            @endif
                            <div style="">
                                {{-- <input type="hidden" name="quantity" value="{{ $item->quantity }}"
                                        data-index="{{ $index }}" oninput="calculateTotal(this)"> --}}
                                <input disabled type="number" name="quantity_{{ $index }}" value="{{ $item->quantity }}"
                                    oninput="calculateTotal()">
                            </div>
                        </div>

                        <div style="width: 20%; text-align: center;">
                            <p id="total_{{ $index }}" style="font-size: large; font-weight: bold;">Rp
                                {{ number_format($item->quantity * $item->product->price, 0, ',', '.') }}</p>
                        </div>

                        <div style="width: 20%; text-align: center;">
                            <a href="/cart/delete/{{ $item->id }}">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div
                style="position:fixed; bottom: 0; left: 0; right: 0; background-color: #ccc; padding: 1.5rem; display: flex; gap: 1.5rem; justify-content: end">
                <div style="">
                    <p style="font-size: large">Total (0 item) : Rp. 0</p>
                </div>
                <button type="submit">Checkout</button>
            </div>
        </div>
    </form>

    <script>
        // Fungsi untuk menghitung total berdasarkan harga dan kuantitas
        function calculateTotal() {
            var total = 0;

            @foreach ($cartItems as $index => $item)
                if (document.getElementById('checkbox_{{ $index }}').checked) {
                    var price = parseFloat(document.getElementById('price_{{ $index }}').dataset.price);
                    var quantity = parseInt(document.getElementsByName('quantity_{{ $index }}')[0].value);

                    // Menangani nilai kosong atau NaN pada quantity
                    if (isNaN(quantity) || quantity < 0) {
                        quantity = 0;
                    }

                    total += price * quantity;
                }
            @endforeach

            // Menampilkan total
            var totalElement = document.querySelector('div[style*="background-color: #ccc;"] p');
            totalElement.innerText = 'Total (' + countChecked() + ' item) : Rp. ' + total.toLocaleString();
        }

        // Fungsi untuk menghitung jumlah checkbox yang dicentang
        function countChecked() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            var count = 0;

            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    count++;
                }
            });

            return count;
        }
    </script>

@endsection
