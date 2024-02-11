@extends('layout.main')

@section('title', '- Cart')

@section('content')

<section class="mb-lg-14 mb-8 mt-8">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card py-1 border-0 mb-8">
            <div>
              <h1 class="fw-bold">Shop Cart</h1>
              <p class="mb-0">There are {{ $cartItems->count() }} products in this cart.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="">
        <form action="/checkout" method="POST" class="row">
            @csrf
        <div class="col-lg-8 col-md-7">
          <div class="py-3">
            @if (session('message-error'))
                <div class="alert alert-danger p-2" role="alert">
                    {{ session('message-error') }}
                </div>
            @elseif (session('message-success'))
                <div class="alert alert-success p-2" role="alert">
                    {{ session('message-success') }}
                </div>
            @else
                <div class="alert alert-primary p-2" role="alert">
                    You’ve got FREE delivery. Start <span class="alert-link">checkout now!</span>
                </div>
            @endif
            <ul class="list-group list-group-flush">
            @foreach ($cartItems as $index => $item)
              <li class="list-group-item py-3 py-lg-3 px-0 border-top">
                <div class="row align-items-center">
                  <div class="col-3 col-md-2 d-flex align-items-center">
                    <input type="checkbox" class="me-1" name="selected_items[{{ $index }}][id]" value="{{ $item->id }}"
                        id="checkbox_{{ $index }}" onchange="calculateTotal()">
                    <img src="{{ asset('storage/product-image/' . $item->product->productImages[0]->image) }}" alt="Ecommerce"
                      class="img-fluid"></div>
                  <div class="col-4 col-md-6">
                    <h6 class="mb-0">{{ $item->product->name }}</h6>
                    <span><small class="text-muted">{{ $item->product->store->name }}</small></span>
                    <div class="mt-2 small "> <a href="/cart/delete/{{ $item->id }}" class="text-decoration-none text-inherit"> <span
                        class="me-1 align-text-bottom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-trash-2 text-success">
                          <polyline points="3 6 5 6 21 6"></polyline>
                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                          </path>
                          <line x1="10" y1="11" x2="10" y2="17"></line>
                          <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg></span><span class="text-muted">Remove</span></a></div>
                  </div>

                  <div class="col-3 col-md-3 col-lg-2">
                    <div class="input-group  flex-nowrap justify-content-center  ">
                      <input type="button" value="-"
                        class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                        data-field="quantity">
                      <input disabled type="number" step="1" max="10" value="{{ $item->quantity }}" name="quantity_{{ $index }}" oninput="calculateTotal()"
                        class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                      <input type="button" value="+"
                        class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                        data-field="quantity">
                    </div>
                  </div>

                  <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                    <span class="fw-bold" id="price_{{ $index }}" data-price="{{ $item->product->price }}">Rp{{ number_format($item->product->price, 0, ',', '.') }}</span>
                  </div>
                </div>
              </li>
            @endforeach
            </ul>

            <div class="d-flex justify-content-between mt-4">
              <a href="/product" class="btn btn-primary">Continue Shopping</a>
              <a href="#!" class="btn btn-dark">Update Cart</a>
            </div>

          </div>
        </div>

        <div class="col-12 col-lg-4 col-md-5">
          <div class="mb-5 card mt-6">
            <div class="card-body p-6">
              <h2 class="h5 mb-4">Summary</h2>
              <div class="card mb-2">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto">
                      <div>Item Subtotal</div>
                    </div>
                    <span id="price-subtotal">Rp0</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto">
                      <div>Service Fee</div>
                    </div>
                    <span>Rp2.000</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto">
                      <div class="fw-bold">Subtotal</div>
                    </div>
                    <span class="fw-bold" id="price-subtotal">Rp0</span>
                  </li>
                </ul>
              </div>

              <div class="d-grid mb-1 mt-4">
                <button class="btn btn-primary btn-lg d-flex justify-content-between align-items-center" type="submit">
                  Go to Checkout <span class="fw-bold" id="total-item"></span></button>
              </div>
              <p><small>By placing your order, you agree to be bound by the Freshcart <a href="#!">Terms of Service</a>
                  and <a href="#!">Privacy Policy.</a> </small></p>
              {{-- <div class="mt-8">
                <h2 class="h5 mb-3">Add Promo or Gift Card</h2>
                <form>
                  <div class="mb-2">
                    <label for="giftcard" class="form-label sr-only">Email address</label>
                    <input type="text" class="form-control" id="giftcard" placeholder="Promo or Gift Card">
                  </div>
                  <div class="d-grid"><button type="submit" class="btn btn-outline-dark mb-1">Redeem</button></div>
                  <p class="text-muted mb-0"> <small>Terms & Conditions apply</small></p>
                </form>
              </div> --}}
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </section>

 

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
            var priceSubtotal = document.getElementById('price-subtotal');
            var totalItem = document.getElementById('total-item');
            // totalElement.innerText = 'Total (' + countChecked() + ' item) : Rp. ' + total.toLocaleString();
            priceSubtotal.innerText = 'Rp' + total.toLocaleString();
            totalItem.innerText = '(' + countChecked() + ')';
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
