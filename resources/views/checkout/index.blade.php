@extends('layout.main')

@section('title', '- Checkout')

@section('content')
<section class="mb-lg-14 mb-8 mt-8">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div>
            <div class="mb-8">
              <h1 class="fw-bold mb-0">Checkout</h1>
              <p class="mb-0">Already have an account? Click here to <a href="#!">Sign in</a>.</p>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="row">
          <div class="col-lg-7 col-md-12">
            <div class="accordion accordion-flush" id="accordionFlushExample">
              {{-- <div class="accordion-item py-4">
                <div class="d-flex justify-content-between align-items-center">
                  <a href="#" class="fs-5 text-inherit collapsed h4"  data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                    <i class="feather-icon icon-map-pin me-2 text-muted"></i>Add delivery address
                  </a>
                  <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#addAddressModal">Add a new address </a>
                </div>
                <div id="flush-collapseOne" class="accordion-collapse collapse show" 
                  data-bs-parent="#accordionFlushExample">
                  <div class="mt-5">
                    <div class="row">
                      <div class="col-lg-6 col-12 mb-4">
                        <div class="border p-6 rounded-3">
                          <div class="form-check mb-4">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="homeRadio" checked>
                            <label class="form-check-label text-dark" for="homeRadio">
                              Home
                            </label>
                          </div>
                          <address> <strong>Jitu Chauhan</strong> <br>
                            4450 North Avenue Oakland, <br>
                            Nebraska, United States,<br>
                            <abbr title="Phone">P: 402-776-1106</abbr></address>
                          <span class="text-danger">Default address </span>
                        </div>
                      </div>
                      <div class="col-lg-6 col-12 mb-4">
                        <div class="border p-6 rounded-3">
                          <div class="form-check mb-4">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="officeRadio">
                            <label class="form-check-label text-dark" for="officeRadio">
                              Office
                            </label>
                          </div>
                          <address> <strong>Nitu Chauhan</strong> <br> 3853 Coal Road, <br>
                            Tannersville, Pennsylvania, 18372, USA,<br>
                            <abbr title="Phone">P: 402-776-1106</abbr>
                          </address>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}
              
              <div class="accordion-item py-4">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="#" class="text-inherit collapsed h5"  data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <i class="feather-icon icon-map-pin me-2 text-muted"></i>Add delivery address
                    </a>
                </div>
                <div id="flush-collapseTwo" class="accordion-collapse collapse show" 
                  data-bs-parent="#accordionFlushExample">
                  <ul class="nav nav-pills nav-pills-light mb-3 nav-fill mt-5" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-a-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-a" type="button" role="tab" aria-controls="pills-a"
                        aria-selected="true">Gedung <br><small>C</small>
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-b-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-b" type="button" role="tab" aria-controls="pills-b"
                            aria-selected="false">Gedung <br><small>O</small>
                        </button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-Tue-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-Tue" type="button" role="tab" aria-controls="pills-Tue"
                            aria-selected="false">Gedung <br><small>O</small>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-Wed-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-Wed" type="button" role="tab" aria-controls="pills-Wed"
                            aria-selected="false">Gedung <br><small>E</small>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-Fri-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-Fri" type="button" role="tab" aria-controls="pills-Fri"
                            aria-selected="false">Gedung <br><small>F</small>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-Sat-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-Sat" type="button" role="tab" aria-controls="pills-Sat"
                            aria-selected="false">Gedung <br><small>N</small>
                        </button>
                    </li> --}}
                  </ul>

                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-a" role="tabpanel"
                      aria-labelledby="pills-a-tab" tabindex="0">
                      <ul class="list-group list-group-flush mt-4">
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                          <div class="col-4">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                              <label class="form-check-label" for="flexRadioDefault1">
                                <span>Lt1 Perpustakaan</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-2 text-end"> <a href="#"
                              class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt1 R1</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt1 R2 Lab TKK</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt1 R3 Lab TKK</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt2 R4</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt2 R5</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt2 R6</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt2 R7</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                      </ul>
                    </div>
                    <div class="tab-pane fade" id="pills-b" role="tabpanel" aria-labelledby="pills-b-tab"
                      tabindex="0">
                      <ul class="list-group list-group-flush mt-4">
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt1 R Waka</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt1 Kepsek</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt1 Lobi</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt2 R16</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt2 R17</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt2 R18 Lab RPL</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt2 R19 Lab RPL</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt3 R20</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt3 R21</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt3 R22</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt3 R23</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                        <li class="list-group-item  d-flex justify-content-between align-items-center px-0 py-3">
                            <div class="col-4">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                  id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <span>Lt3 R24</span>
                                </label>
                              </div>
                            </div>
                            <div class="col-2 text-end"> <a href="#"
                                class="btn btn-outline-gray-400 btn-sm text-muted">Choose</a></div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="mt-5 d-flex justify-content-end">
                    <a href="#" class="btn btn-primary ms-2"  data-bs-toggle="collapse"
                      data-bs-target="#flush-collapseThree" aria-expanded="false"
                      aria-controls="flush-collapseThree">Next</a>
                  </div>
                </div>
              </div>

              <div class="accordion-item py-4">
                <a href="#" class="text-inherit h5"  data-bs-toggle="collapse"
                  data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                  <i class="feather-icon icon-shopping-bag me-2 text-muted"></i>Delivery instructions
                </a>
                <div id="flush-collapseThree" class="accordion-collapse collapse " 
                  data-bs-parent="#accordionFlushExample">
                  <div class="mt-5">
                    <label for="DeliveryInstructions" class="form-label sr-only">Delivery instructions</label>
                    <textarea class="form-control" id="DeliveryInstructions" rows="3"
                      placeholder="Write delivery instructions "></textarea>
                    <p class="form-text">Add instructions for how you want your order shopped and/or delivered</p>
                    <div class="mt-5 d-flex justify-content-end">
                      <a href="#" class="btn btn-outline-gray-400 text-muted" 
                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                        aria-controls="flush-collapseTwo">Prev</a>
                      <a href="#" class="btn btn-primary ms-2"  data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseFour" aria-expanded="false"
                        aria-controls="flush-collapseFour">Next</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="accordion-item py-4">
                <a href="#" class="text-inherit h5"  data-bs-toggle="collapse"
                  data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                  <i class="feather-icon icon-credit-card me-2 text-muted"></i>Payment Method
                </a>
                <div id="flush-collapseFour" class="accordion-collapse collapse " 
                  data-bs-parent="#accordionFlushExample">
                  <div class="mt-5">
                    <div>
                      {{-- <div class="card card-bordered shadow-none mb-2">
                        <div class="card-body p-6">
                          <div class="d-flex">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="paypal">
                              <label class="form-check-label ms-2" for="paypal">
                              </label>
                            </div>
                            <div>
                              <!-- title -->
                              <h5 class="mb-1 h6"> Payment with Paypal</h5>
                              <p class="mb-0 small">You will be redirected to PayPal website to complete your purchase
                                securely.</p>
                            </div>
                          </div>
                        </div>
                      </div> --}}

                      <div class="card card-bordered shadow-none">
                        <div class="card-body p-6">
                          <div class="d-flex">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="cashonDelivery">
                              <label class="form-check-label ms-2" for="cashonDelivery">
                              </label>
                            </div>
                            <div>
                              <h5 class="mb-1 h6"> Cash on Delivery</h5>
                              <p class="mb-0 small">Pay with cash when your order is delivered.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="mt-5 d-flex justify-content-end">
                        <a href="#" class="btn btn-outline-gray-400 text-muted" 
                          data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false"
                          aria-controls="flush-collapseThree">Prev</a>
                        <button id="placeOrderButton" class="btn btn-primary ms-2">Place Order</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-5">
            <div class="mt-4 mt-lg-0">
              <div class="card shadow-sm">
                <h5 class="px-6 py-4 bg-transparent mb-0">Order Details</h5>
                <ul class="list-group list-group-flush">
                @foreach ($order->orderItems as $item)
                  <li class="list-group-item px-4 py-3">
                    <div class="row align-items-center">
                      <div class="col-2 col-md-2">
                        <img src="{{ asset('storage/product-image/' . $item->product->productImages[0]->image) }}" alt="Ecommerce" class="img-fluid"></div>
                      <div class="col-5 col-md-5">
                        <h6 class="mb-0">{{ $item->product->name }}</h6>
                        <span><small class="text-muted">{{ $item->product->store->name }}</small></span>
                      </div>
                      <div class="col-2 col-md-2 text-center text-muted">
                        <span>{{ $item->quantity }}</span>
                      </div>
                      <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                        <span class="fw-bold">Rp{{ number_format($item->quantity * $item->product->price, 0, ',', '.') }}</span>
                      </div>
                    </div>
                  </li>
                @endforeach

                <li class="list-group-item px-4 py-3">
                    <div class="d-flex align-items-center justify-content-between   mb-2">
                      <div>
                        Item Subtotal
                      </div>
                      <div class="fw-bold">
                        Rp{{ number_format($order->total, 0, ',', '.') }}
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between  ">
                      <div>
                        Service Fee <i class="feather-icon icon-info text-muted" data-bs-toggle="tooltip"
                          title="Default tooltip"></i>
                      </div>
                      <div class="fw-bold">
                        Rp2.000
                      </div>
                    </div>
                  </li>

                  <li class="list-group-item px-4 py-3">
                    <div class="d-flex align-items-center justify-content-between fw-bold">
                      <div>
                        Subtotal
                      </div>
                      <div>
                        Rp{{ number_format($order->total + 2000, 0, ',', '.') }}
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
<h1>Checkout</h1>

<div style="background-color: #cbd5e1; margin-top: 3rem; padding: 1rem">
    <p>Place of payment</p>

    <form id="checkoutForm" action="/checkout/order" method="POST">
        @csrf
        <input type="text" style="width: 100%" name="place_of_payment" placeholder="place of payment" required>
        <input type="hidden" name="order_id" value="{{ $order->id }}" style="width: 100%" >
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
        <p>{{ $order->total }}</p>
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
