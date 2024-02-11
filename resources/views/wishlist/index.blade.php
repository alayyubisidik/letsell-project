@extends('layout.main')

@section('title', '- Wishlist')

@section('content')
<section class="mb-lg-14 mb-8 mt-8">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="mb-8">
            <h1 class="mb-1">My Wishlist</h1>
            <p>There are {{ $wishlists->count() }} products in this wishlist.</p>
          </div>
          <div>
            <div class="table-responsive">
              <table class="table text-nowrap">
                <thead class="table-light">
                  <tr>
                    <th></th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($wishlists as $wishlist)
                  <tr>
                    {{-- <td class="align-middle">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="chechboxTwo">
                        <label class="form-check-label" for="chechboxTwo">
                        </label>
                      </div>
                    </td> --}}
                    <td class="align-middle">
                      <a href="#"><img src="{{ asset('/storage/product-image/' . $wishlist->product->productImages[0]->image) }}"
                          class="img-fluid icon-shape icon-xxl" alt=""></a>
                    </td>
                    <td class="align-middle">
                      <div>
                        <h5 class="fs-6 mb-0"><a href="#" class="text-inherit">{{ $wishlist->product->name }}</a></h5>
                        <a href="/store/{{ $wishlist->product->store->slug }}">{{ $wishlist->product->store->name }}</a> on <a href="/product?search={{ $wishlist->product->category->slug }}">{{ $wishlist->product->category->name }}</a>
                      </div>
                    </td>
                    <td class="align-middle">{{ $wishlist->created_at->diffForHumans() }}</td>
                    <td class="align-middle"><span class="badge bg-success">{{ $wishlist->product->stock }} left in stock</span></td>
                    <td class="align-middle">
                      <div class="btn btn-primary btn-sm">Add to Cart</div>
                    </td>
                    <td class="align-middle text-center"><a href="/wishlist/delete/{{ $wishlist->id }}" class="text-muted" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Delete">
                        <i class="feather-icon icon-trash-2"></i>
                      </a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    {{-- <h1>Wishlist</h1>

    @foreach ($wishlists as $wishlist)
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('/storage/product-image/' . $wishlist->product->productImages[0]->image) }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $wishlist->product->name }}</h5>
                        <p>by <a href="/store/{{ $wishlist->product->store->slug }}">{{ $wishlist->product->store->name }}</a> on <a href="/product?search={{ $wishlist->product->category->slug }}">{{ $wishlist->product->category->name }}</a></p>
                        <p>{{ $wishlist->product->stock }} left in stock</p>
                        @if (session('message-success'))
                            <p style="color: green; font-size: small;">{{ session('message-success') }}</p>
                        @endif
                        <a href="/wishlist/delete/{{ $wishlist->id }}">Delete</a>
                        <p class="card-text"><small class="text-body-secondary">{{ $wishlist->created_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}





@endsection
