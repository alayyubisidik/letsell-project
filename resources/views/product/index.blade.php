@extends('layout.main')

@section('title', '- Product')

@section('content')

    {{-- <h1>Product</h1>

    <div style="background-color: #aaa; display: flex; gap: 2rem">
        <div>
            <p>Search by category</p>
            <form action="/product" method="GET" id="searchForm">
                <select name="search" onchange="submitForm()">
                    <option value="">All Product</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}" {{ ($category->name == request('search')) ? 'selected' : '' }}>
                            {{ $category->name }} ({{ $category->products_count }})
                        </option>
                    @endforeach
                </select>
            </form>
            
            <script>
                function submitForm() {
                    document.getElementById("searchForm").submit();
                }
            </script>
        </div>

        <div>
            <form action="/product" method="GET" >
                <input type="number" name="min" placeholder="Rp MIN" value="{{ request('min') }}">
                <input type="number" name="max" placeholder="Rp MAX" value="{{ request('min') }}">
                <button type="submit">Apply</button>
            </form>
        </div>
    </div>

    <div style="background-color: #cbd5e1; display: flex; gap: 1.5rem; padding: 1rem; flex-wrap: wrap; justify-content: center">
        @foreach ($products as $product)
            <a href="/product/{{ $product->slug }}">
                <div class="card" style="width: 18rem; background-color: #fff;">
                    <img style="width: 100%" src="{{ asset('storage/product-image/' . $product->productImages[0]->image) }}" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p style="font-size: small; color: gray">by <a href="/store/{{ $product->store->slug }}">{{ $product->store->name }}</a> on <a href="product?search={{ $product->category->name }}">{{ $product->category->name}}</a></p>
    
                        <p style="font-size: large; font-weight: bold; color: orange">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div> --}}

    <div class="mt-4">
        <div class="container">
          <div class="row ">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#!">Home</a></li>
                  <li class="breadcrumb-item"><a href="#!">Shop</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Snacks & Munchies</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <section class=" mt-8 mb-lg-14 mb-8">
        <div class="container">
          <div class="row gx-10">
            <div class="col-lg-3 col-md-4 mb-6 mb-md-0">
              <div class="py-4">
                <h5 class="mb-3">Categories</h5>
                <ul class="nav nav-category" id="categoryCollapseMenu">
                  <li class="nav-item border-bottom w-100 collapsed" data-bs-toggle="collapse"
                    data-bs-target="#categoryFlushOne" aria-expanded="false" aria-controls="categoryFlushOne"><a href="#"
                      class="nav-link">Dairy, Bread & Eggs <i class="feather-icon icon-chevron-right"></i></a>
                    <div id="categoryFlushOne" class="accordion-collapse collapse" 
                      data-bs-parent="#categoryCollapseMenu">
                      <div>
                        <ul class="nav flex-column ms-3">
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Milk</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Milk Drinks</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Curd & Yogurt</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Eggs</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Bread</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Buns & Bakery</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Butter & More</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Cheese</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Paneer & Tofu</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Cream & Whitener</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Condensed Milk</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Vegan Drinks</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>

                  {{-- <li class="nav-item border-bottom w-100 collapsed" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"><a href="#"
                      class="nav-link">
                      Snacks &
                      Munchies <i class="feather-icon icon-chevron-right"></i>
                    </a>
    
                    <!-- collapse -->
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" 
                      data-bs-parent="#categoryCollapseMenu">
                      <div>
    
    
    
                        <ul class="nav flex-column ms-3">
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Chips & Crisps</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Nachos</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Popcorn</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Bhujia & Mixtures</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Namkeen Snacks</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Healthy Snacks</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Cakes & Rolls</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Energy Bars</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Papad & Fryums</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Rusks & Wafers</a></li>
                        </ul>
    
    
                      </div>
                    </div>
    
                  </li>
                  <li class="nav-item border-bottom w-100 collapsed" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree"> <a
                      href="#" class="nav-link">Fruits & Vegetables <i class="feather-icon icon-chevron-right"></i></a>
    
                    <!-- collapse -->
                    <div id="flush-collapseThree" class="accordion-collapse collapse" 
                      data-bs-parent="#categoryCollapseMenu">
                      <div>
    
                        <ul class="nav flex-column ms-3">
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#!">Fresh Vegetables</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Herbs & Seasonings</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Fresh Fruits</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Organic Fruits & Vegetables</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Cuts & Sprouts</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Exotic Fruits & Veggies</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Flower Bouquets, Bunches</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li class="nav-item border-bottom w-100 collapsed" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour"> <a
                      href="#" class="nav-link">Cold Drinks & Juices <i class="feather-icon icon-chevron-right"></i></a>
    
                    <!-- collapse -->
                    <div id="flush-collapseFour" class="accordion-collapse collapse" 
                      data-bs-parent="#categoryCollapseMenu">
                      <div>
                        <ul class="nav flex-column ms-3">
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Soft Drinks</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Fruit Juices</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Coldpress</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Energy Drinks</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Water & Ice Cubes</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Soda & Mixers</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Concentrates & Syrups</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Detox & Energy Drinks</a></li>
                          <!-- nav item -->
                          <li class="nav-item"><a href="#!" class="nav-link">Juice Collection</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li class="nav-item border-bottom w-100 collapsed" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive"> <a
                      href="#" class="nav-link">Breakfast & Instant Food <i class="feather-icon icon-chevron-right"></i></a>
    
                    <!-- collapse -->
                    <div id="flush-collapseFive" class="accordion-collapse collapse" 
                      data-bs-parent="#categoryCollapseMenu">
                      <div>
    
                        <ul class="nav flex-column ms-3">
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#!">Batter</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Breakfast Cereal</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Noodles, Pasta & Soup</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Frozen Non-Veg Snackss</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Frozen Veg</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Vermicelli</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Instant Mixes</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li class="nav-item border-bottom w-100 collapsed" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix"> <a href="#"
                      class="nav-link">Bakery & Biscuits <i class="feather-icon icon-chevron-right"></i></a>
    
                    <!-- collapse -->
                    <div id="flush-collapseSix" class="accordion-collapse collapse" 
                      data-bs-parent="#categoryCollapseMenu">
                      <div>
    
                        <ul class="nav flex-column ms-3">
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#!">Cookies</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Glucose & Marie</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Sweet & Salty</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Healthy & Digestive</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Cream Biscuits</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Rusks & Wafers</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Cakes & Rolls</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">
                              Buns & Bakery</a>
                          </li>
                        </ul>
    
                      </div>
                    </div>
                  </li>
                  <li class="nav-item border-bottom w-100 collapsed" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven"> <a
                      href="#" class="nav-link">Chicken, Meat & Fish <i class="feather-icon icon-chevron-right"></i></a>
    
                    <!-- collapse -->
                    <div id="flush-collapseSeven" class="accordion-collapse collapse" 
                      data-bs-parent="#categoryCollapseMenu">
                      <div>
    
                        <ul class="nav flex-column ms-3">
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#!">Chicken</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Sausage, Salami & Ham</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Exotic Meat</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Eggs</a>
                          </li>
                          <!-- nav item -->
                          <li class="nav-item">
                            <a class="nav-link" href="#!">Frozen Non-Veg Snacks</a>
                          </li>
    
                        </ul>
                      </div>
                    </div>
                  </li> --}}
    
                </ul>
              </div>
    
              <div class="py-4">
                <h5 class="mb-3">Stores</h5>
                <div class="my-4">
                  <input type="search" class="form-control" placeholder="Search by store">
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" value="" id="eGrocery" checked>
                  <label class="form-check-label" for="eGrocery">
                    E-Grocery
                  </label>
                </div>
                {{-- <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" value="" id="DealShare">
                  <label class="form-check-label" for="DealShare">
                    DealShare
                  </label>
                </div>
                <div class="form-check mb-2">
                  <!-- input -->
                  <input class="form-check-input" type="checkbox" value="" id="Dmart">
                  <label class="form-check-label" for="Dmart">
                    DMart
                  </label>
                </div>
                <div class="form-check mb-2">
                  <!-- input -->
                  <input class="form-check-input" type="checkbox" value="" id="Blinkit">
                  <label class="form-check-label" for="Blinkit">
                    Blinkit
                  </label>
                </div>
                <div class="form-check mb-2">
                  <!-- input -->
                  <input class="form-check-input" type="checkbox" value="" id="BigBasket">
                  <label class="form-check-label" for="BigBasket">
                    BigBasket
                  </label>
                </div>
                <div class="form-check mb-2">
                  <!-- input -->
                  <input class="form-check-input" type="checkbox" value="" id="StoreFront">
                  <label class="form-check-label" for="StoreFront">
                    StoreFront
                  </label>
                </div>
                <div class="form-check mb-2">
                  <!-- input -->
                  <input class="form-check-input" type="checkbox" value="" id="Spencers">
                  <label class="form-check-label" for="Spencers">
                    Spencers
                  </label>
                </div>
                <div class="form-check mb-2">
                  <!-- input -->
                  <input class="form-check-input" type="checkbox" value="" id="onlineGrocery">
                  <label class="form-check-label" for="onlineGrocery">
                    Online Grocery
                  </label>
                </div> --}}
    
              </div>
              <div class="py-4">
                <h5 class="mb-3">Price</h5>
                <div>
                  <div id="priceRange" class="mb-3"></div>
                  <small class="text-muted">Price:</small> <span id="priceRange-value" class="small"></span>
                </div>
              </div>

              <div class="py-4">
                <h5 class="mb-3">Rating</h5>
                <div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="ratingFive">
                    <label class="form-check-label" for="ratingFive">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning "></i>
                      <i class="bi bi-star-fill text-warning "></i>
                      <i class="bi bi-star-fill text-warning "></i>
                      <i class="bi bi-star-fill text-warning "></i>
                    </label>
                  </div>

                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="ratingFour" checked>
                    <label class="form-check-label" for="ratingFour">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning "></i>
                      <i class="bi bi-star-fill text-warning "></i>
                      <i class="bi bi-star-fill text-warning "></i>
                      <i class="bi bi-star text-warning"></i>
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="ratingThree">
                    <label class="form-check-label" for="ratingThree">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning "></i>
                      <i class="bi bi-star-fill text-warning "></i>
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="ratingTwo">
                    <label class="form-check-label" for="ratingTwo">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="ratingOne">
                    <label class="form-check-label" for="ratingOne">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                    </label>
                  </div>
                </div>
    
    
              </div>
              <div class="py-4">
                <div class="position-absolute p-5 py-8">
                  <h3 class="mb-0">Fresh Fruits </h3>
                  <p>Get Upto 25% Off</p>
                  <a href="#" class="btn btn-dark">Shop Now<i class="feather-icon icon-arrow-right ms-1"></i></a>
                </div>
                <img src="../assets/images/banner/assortment-citrus-fruits.png" alt=""
                  class="img-fluid rounded-3">
              </div>
            </div>
            <div class="col-lg-9 col-md-8">
              <div class="card mb-4 bg-light border-0">
                <div class=" card-body p-9">
                  <h1 class="mb-0">Nama Kategori Muncul</h1>
                </div>
              </div>
              <div class="d-md-flex justify-content-between align-items-center">
                <div>
                  <p class="mb-3 mb-md-0"> <span class="text-dark">24 </span> Products found </p>
                </div>
                <!-- icon -->
                <div class="d-flex justify-content-between align-items-center">
                  {{-- <a href="shop-list.html" class="text-muted me-3"><i class="bi bi-list-ul"></i></a>
                  <a href="shop-grid.html" class=" me-3 active"><i class="bi bi-grid"></i></a>
                  <a href="shop-grid-3-column.html" class="me-3 text-muted"><i class="bi bi-grid-3x3-gap"></i></a> --}}
                  <div class="me-2">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Show: 50</option>
                      <option value="10">10</option>
                      <option value="20">20</option>
                      <option value="30">30</option>
                    </select></div>
                  <div>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Sort by: Featured</option>
                      <option value="Low to High">Price: Low to High</option>
                      <option value="High to Low"> Price: High to Low</option>
                      <option value="Release Date"> Release Date</option>
                      <option value="Avg. Rating"> Avg. Rating</option>
    
                    </select></div>
                </div>
              </div>

              <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                @foreach ($products as $product)
                <div class="col">
                  <div class="card card-product">
                    <div class="card-body">
                      <div class="text-center position-relative ">
                        <div class=" position-absolute top-0 start-0">
                          <span class="badge bg-danger">Hot Inihhh</span>
                        </div>
                        <a href="#!">
                          <img src="{{ asset('storage/product-image/' . $product->productImages[0]->image) }}"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <div class="card-product-action">
                          <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                              class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                          <a href="shop-wishlist.html" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Wishlist"><i class="bi bi-heart"></i></a>
                        </div>
                      </div>
                      <div class="text-small mb-1"><a href="/store/{{ $product->store->name }}" class="text-decoration-none text-muted"><small>{{ $product->store->name }}</small></a><small class=""> on </small><a href="product?search={{ $product->category->name }}" class="text-decoration-none text-muted"><small>{{ $product->category->name }}</small></a></div>
                      <h2 class="fs-6"><a href="/product/{{ $product->slug }}" class="text-inherit text-decoration-none">{{ $product->name }}</a></h2>
                      <div>
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5(149)</span>
                      </div>
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">{{ number_format($product->price, 0, ',', '.') }}</span> <span
                            class="text-decoration-line-through text-muted">Rp2M</span>
                        </div>
                        <!-- btn -->
                        <div><a href="#!" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-plus">
                              <line x1="12" y1="5" x2="12" y2="19"></line>
                              <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Add</a></div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach

                {{-- <div class="col">
                  <!-- card -->
                  <div class="card card-product">
                    <div class="card-body">
                      <!-- badge -->
                      <div class="text-center position-relative">
                        <div class=" position-absolute top-0 start-0">
                          <span class="badge bg-success">14%</span>
                        </div>
    
                        <a href="#!">
                          <!-- img --><img src="../assets/images/products/product-img-2.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                        <div class="card-product-action">
                          <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                              class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                              class="bi bi-heart"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                              class="bi bi-arrow-left-right"></i></a>
                        </div>
                      </div>
                      <!-- heading -->
                      <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Bakery &
                            Biscuits</small></a></div>
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">NutriChoice Digestive </a>
                      </h2>
                      <div class="text-warning">
                        <!-- rating -->
                        <small> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5 (25)</span>
                      </div>
                      <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$24</span>
                        </div>
                        <!-- btn -->
                        <div><a href="#!" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-plus">
                              <line x1="12" y1="5" x2="12" y2="19"></line>
                              <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Add</a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <!-- card -->
                  <div class="card card-product">
                    <div class="card-body">
                      <!-- badge -->
                      <div class="text-center position-relative"> <a href="#!"><img
                            src="../assets/images/products/product-img-3.jpg" alt="Grocery Ecommerce Template"
                            class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                        <div class="card-product-action">
                          <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                              class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                              class="bi bi-heart"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                              class="bi bi-arrow-left-right"></i></a>
                        </div>
                      </div>
                      <!-- heading -->
                      <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Bakery &
                            Biscuits</small></a></div>
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Cadbury 5 Star Chocolate</a>
                      </h2>
                      <div class="text-warning">
                        <!-- rating -->
                        <small> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i></small> <span class="text-muted small">5 (469)</span>
                      </div>
                      <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$32</span> <span
                            class="text-decoration-line-through text-muted">$35</span>
                        </div>
                        <!-- btn -->
                        <div><a href="#!" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-plus">
                              <line x1="12" y1="5" x2="12" y2="19"></line>
                              <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Add</a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <!-- card -->
                  <div class="card card-product">
                    <div class="card-body">
                      <!-- badge -->
                      <div class="text-center position-relative">
                        <div class=" position-absolute top-0">
                          <span class="badge bg-danger">hot</span>
                        </div>
    
                        <a href="#!">
                          <!-- img --><img src="../assets/images/products/product-img-4.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                        <div class="card-product-action">
                          <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                              class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                              class="bi bi-heart"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                              class="bi bi-arrow-left-right"></i></a>
                        </div>
                      </div>
                      <!-- heading -->
                      <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Snack &
                            Munchies</small></a></div>
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Onion Flavour Potato</a></h2>
                      <div class="text-warning">
                        <!-- rating -->
                        <small> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i>
                          <i class="bi bi-star"></i></small> <span class="text-muted small">3.5 (456)</span>
                      </div>
                      <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$3</span> <span
                            class="text-decoration-line-through text-muted">$5</span>
                        </div>
                        <!-- btn -->
                        <div><a href="#!" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-plus">
                              <line x1="12" y1="5" x2="12" y2="19"></line>
                              <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Add</a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <!-- card -->
                  <div class="card card-product">
                    <div class="card-body">
                      <!-- badge -->
                      <div class="text-center position-relative"> <a href="#!"><img
                            src="../assets/images/products/product-img-5.jpg" alt="Grocery Ecommerce Template"
                            class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                        <div class="card-product-action">
                          <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                              class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                              class="bi bi-heart"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                              class="bi bi-arrow-left-right"></i></a>
                        </div>
                      </div>
                      <!-- heading -->
                      <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Instant
                            Food</small></a></div>
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Salted Instant Popcorn </a>
                      </h2>
                      <div class="text-warning">
                        <!-- rating -->
                        <small> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5 (39)</span>
                      </div>
                      <div class="d-flex justify-content-between mt-4">
                        <div><span class="text-dark">$13</span> <span
                            class="text-decoration-line-through text-muted">$18</span>
                        </div>
                        <!-- btn -->
                        <div><a href="#!" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-plus">
                              <line x1="12" y1="5" x2="12" y2="19"></line>
                              <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Add</a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <!-- card -->
                  <div class="card card-product">
                    <div class="card-body">
    
                      <!-- badge -->
                      <div class="text-center position-relative ">
                        <div class=" position-absolute top-0">
                          <span class="badge bg-danger">Sale</span>
                        </div>
                        <a href="#!">
                          <!-- img --><img src="../assets/images/products/product-img-6.jpg"
                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                        <div class="card-product-action">
                          <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                              class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                          <a href="shop-wishlist.html" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                            title="Wishlist"><i class="bi bi-heart"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                              class="bi bi-arrow-left-right"></i></a>
                        </div>
                      </div>
                      <!-- heading -->
                      <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Dairy, Bread
                            &
                            Eggs</small></a></div>
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Blueberry Greek Yogurt</a>
                      </h2>
                      <div>
                        <!-- rating -->
                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5 (189)</span>
                      </div>
                      <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$18</span> <span
                            class="text-decoration-line-through text-muted">$24</span>
                        </div>
                        <!-- btn -->
                        <div><a href="#!" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-plus">
                              <line x1="12" y1="5" x2="12" y2="19"></line>
                              <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Add</a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <!-- card -->
                  <div class="card card-product">
                    <div class="card-body">
                      <!-- badge -->
                      <div class="text-center position-relative"> <a href="#!"><img
                            src="../assets/images/products/product-img-7.jpg" alt="Grocery Ecommerce Template"
                            class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                        <div class="card-product-action">
                          <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                              class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                              class="bi bi-heart"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                              class="bi bi-arrow-left-right"></i></a>
                        </div>
                      </div>
                      <!-- heading -->
                      <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Dairy, Bread
                            &
                            Eggs</small></a></div>
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Britannia Cheese Slices</a>
                      </h2>
                      <div class="text-warning">
                        <!-- rating -->
                        <small> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i></small> <span class="text-muted small">5 (345)</span>
                      </div>
                      <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$24</span>
                        </div>
                        <!-- btn -->
                        <div><a href="#!" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-plus">
                              <line x1="12" y1="5" x2="12" y2="19"></line>
                              <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Add</a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <!-- card -->
                  <div class="card card-product">
                    <div class="card-body">
                      <!-- badge -->
                      <div class="text-center position-relative"> <a href="#!"><img
                            src="../assets/images/products/product-img-8.jpg" alt="Grocery Ecommerce Template"
                            class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                        <div class="card-product-action">
                          <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                              class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                              class="bi bi-heart"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                              class="bi bi-arrow-left-right"></i></a>
                        </div>
                      </div>
                      <!-- heading -->
                      <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Instant
                            Food</small></a></div>
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Kellogg's Original Cereals</a>
                      </h2>
                      <div class="text-warning">
                        <!-- rating -->
                        <small> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4 (90)</span>
                      </div>
                      <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$32</span> <span
                            class="text-decoration-line-through text-muted">$35</span>
                        </div>
                        <!-- btn -->
                        <div><a href="#!" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-plus">
                              <line x1="12" y1="5" x2="12" y2="19"></line>
                              <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Add</a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <!-- card -->
                  <div class="card card-product">
                    <div class="card-body">
                      <!-- badge -->
                      <div class="text-center position-relative"> <a href="#!"><img
                            src="../assets/images/products/product-img-9.jpg" alt="Grocery Ecommerce Template"
                            class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                        <div class="card-product-action">
                          <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                              class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                              class="bi bi-heart"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                              class="bi bi-arrow-left-right"></i></a>
                        </div>
                      </div>
                      <!-- heading -->
                      <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Snack &
                            Munchies</small></a></div>
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Slurrp Millet Chocolate </a>
                      </h2>
                      <div class="text-warning">
                        <!-- rating -->
                        <small> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i></small> <span class="text-muted small">4.5 (67)</span>
                      </div>
                      <!-- price -->
                      <div class="d-flex justify-content-between align-items-center mt-3">
                        <div><span class="text-dark">$3</span> <span
                            class="text-decoration-line-through text-muted">$5</span>
                        </div>
                        <!-- btn -->
                        <div><a href="#!" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-plus">
                              <line x1="12" y1="5" x2="12" y2="19"></line>
                              <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Add</a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <!-- card -->
                  <div class="card card-product">
                    <div class="card-body">
                      <!-- badge -->
                      <div class="text-center position-relative"> <a href="#!"><img
                            src="../assets/images/products/product-img-10.jpg" alt="Grocery Ecommerce Template"
                            class="mb-3 img-fluid"></a>
                        <!-- action btn -->
                        <div class="card-product-action">
    
                          <a href="#!" class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                              class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i
                              class="bi bi-heart"></i></a>
                          <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i
                              class="bi bi-arrow-left-right"></i></a>
                        </div>
                      </div>
                      <!-- heading -->
                      <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>Dairy, Bread
                            &
                            Eggs</small></a></div>
                      <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Amul Butter - 500 g</a></h2>
                      <div class="text-warning">
                        <!-- rating -->
                        <small> <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i>
                          <i class="bi bi-star"></i></small> <span class="text-muted small">3.5 (89)</span>
                      </div>
                      <div class="d-flex justify-content-between mt-4">
                        <div><span class="text-dark">$13</span> <span
                            class="text-decoration-line-through text-muted">$18</span>
                        </div>
                        <!-- btn -->
                        <div><a href="#!" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-plus">
                              <line x1="12" y1="5" x2="12" y2="19"></line>
                              <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Add</a></div>
                      </div>
                    </div>
                  </div>
                </div> --}}
              </div>
              <div class="row mt-8">
                <div class="col">
                         <!-- nav -->
                  <nav>
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <a class="page-link  mx-1 rounded-3 " href="#" aria-label="Previous">
                          <i class="feather-icon icon-chevron-left"></i>
                        </a>
                      </li>
                      <li class="page-item "><a class="page-link  mx-1 rounded-3 active" href="#">1</a></li>
                      <li class="page-item"><a class="page-link mx-1 rounded-3 text-body" href="#">2</a></li>
    
                      <li class="page-item"><a class="page-link mx-1 rounded-3 text-body" href="#">...</a></li>
                      <li class="page-item"><a class="page-link mx-1 rounded-3 text-body" href="#">12</a></li>
                      <li class="page-item">
                        <a class="page-link mx-1 rounded-3 text-body" href="#" aria-label="Next">
                          <i class="feather-icon icon-chevron-right"></i>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="modal fade" id="quickViewModal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body p-8">
              <div class="d-flex justify-content-end">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="row">
                <div class="col-md-6">
                     <div class="product productModal" id="productModal">
                      <div class="zoom" onmousemove="zoom(event)" style="background-image: url(../assets/images/products/product-single-img-1.jpg)">
                        <img src="../assets/images/products/product-single-img-1.jpg" alt="" >
                      </div>
                    <div>
                      <div class="zoom" onmousemove="zoom(event)" style="background-image: url(../assets/images/products/product-single-img-2.jpg)">
                        <img src="../assets/images/products/product-single-img-2.jpg" alt="" >
                      </div>
                    </div>
                    <div>
                      <div class="zoom" onmousemove="zoom(event)" style="background-image: url(../assets/images/products/product-single-img-3.jpg)">
                        <img src="../assets/images/products/product-single-img-3.jpg" alt="" >
                      </div>
                    </div>
                    <div>
                      <div class="zoom" onmousemove="zoom(event)" style="background-image: url(../assets/images/products/product-single-img-4.jpg)">
                        <img src="../assets/images/products/product-single-img-4.jpg" alt="" >
                      </div>
                      </div>
                    </div>
                    <div class="product-tools">
                      <div class="thumbnails row g-3" id="productModalThumbnails">
                        <div class="col-3">
                          <div class="thumbnails-img">
                            <img src="../assets/images/products/product-single-img-1.jpg" alt="">
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="thumbnails-img">
                            <img src="../assets/images/products/product-single-img-2.jpg" alt="">
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="thumbnails-img">
                            <img src="../assets/images/products/product-single-img-3.jpg" alt="">
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="thumbnails-img">
                            <img src="../assets/images/products/product-single-img-4.jpg" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="ps-md-8">
                    <a href="#!" class="mb-4 d-block">Bakery Biscuits</a>
                    <h2 class="mb-1 h1">Napolitanke Ljesnjak </h2>
                    <div class="mb-4">   <small class="text-warning"> <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-half"></i></small><a href="#" class="ms-2">(30 reviews)</a></div>
                    <div class="fs-4"><span class="fw-bold text-dark">$32</span> <span
                            class="text-decoration-line-through text-muted">$35</span><span><small
                                class="fs-6 ms-2 text-danger">26% Off</small></span>
                    </div>
                    <hr class="my-6">
                    <div><button type="button" class="btn btn-outline-secondary">250g</button>
                        <button type="button" class="btn btn-outline-secondary">500g</button>
                        <button type="button" class="btn btn-outline-secondary">1kg</button></div>
                    <div class="mt-5 d-flex justify-content-start">
                        <div class="col-2">
                          <div class="input-group  flex-nowrap justify-content-center ">
                            <input type="button" value="-" class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  " data-field="quantity">
                            <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                            <input type="button" value="+" class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  " data-field="quantity">
                          </div>
                        </div>
                        <div class="ms-2 col-4 d-grid">
                            <button type="button" class="btn btn-primary"><i class="feather-icon icon-shopping-bag me-2"></i>Add to cart</button>
                            </div>
                            <div class="ms-2 col-4">
                             <a class="btn btn-light" href="#"  data-bs-toggle="tooltip" data-bs-html="true" title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                              <a class="btn btn-light" href="shop-wishlist.html"  data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i class="feather-icon icon-heart"></i></a>
                        </div>
                    </div>
                    <hr class="my-6">
                    <div>
                      <table class="table table-borderless">
    
                        <tbody>
                          <tr>
                            <td>Product Code:</td>
                            <td>FBB00255</td>
    
                          </tr>
                          <tr>
                            <td>Availability:</td>
                            <td>In Stock</td>
    
                          </tr>
                          <tr>
                            <td>Type:</td>
                            <td>Fruits</td>
    
                          </tr>
                          <tr>
                            <td>Shipping:</td>
                            <td><small>01 day shipping.<span class="text-muted">( Free pickup today)</span></small></td>
    
                          </tr>
    
    
                        </tbody>
                      </table>
    
                    </div>
                  </div>
    
                </div>
            </div>
            </div>
    
          </div>
        </div>
      </div>

@endsection
