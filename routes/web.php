<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardSellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/logout', [AuthController::class, 'logout']); 

Route::middleware(['guest'])->group(function () {
    // Route::match(['get', 'post'], '/login', [AuthController::class, 'login']);
    Route::get('/login', [AuthController::class, 'showLogin']);
    Route::post('/login', [AuthController::class, 'submitLogin']);
    Route::match(['get', 'post'], '/register', [AuthController::class, 'register']);
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/dashboard-admin', function() {
        return view('dashboard-admin.index');
    });

    Route::match(['get', 'post'], '/profile/edit', [UserController::class, 'profileEdit']);
    
    Route::get('/dashboard-admin/user', [UserController::class, 'dashboardUserPage']);
    Route::post('/dashboard-admin/user/approve-the-user', [UserController::class, 'approveTheUser']);
    
    Route::get('/dashboard-admin/product', [DashboardAdminController::class, 'index']);
    // Route::match(['get', 'post'], '/dashboard-admin/product/create', [DashboardAdminController::class, 'createProduct']);
    Route::get('/dashboard-admin/category', [DashboardAdminController::class, 'category']);
    Route::match(['get', 'post'], '/dashboard-admin/category/create', [DashboardAdminController::class, 'createCategory']);
    
});

Route::middleware(['role:customer'])->group(function () {
    Route::match(['get', 'post'], '/store-create', [StoreController::class, 'createStore']);
    
});

Route::middleware(['role:seller'])->group(function () {
    Route::match(['get', 'post'], '/subscription', [StoreController::class, 'subscription']);
    
    Route::get('/dashboard-seller', [DashboardSellerController::class, 'index']);
    Route::get("/dashboard-seller/store", [DashboardSellerController::class, 'store']);
    Route::match(['get', 'post'], '/dashboard-seller/store/edit/{slug}', [DashboardSellerController::class, 'storeEdit']);
    Route::post('/dashboard-seller/store/banner', [DashboardSellerController::class, 'createBanner']);
    Route::get('/dashboard-seller/store/banner/delete', [DashboardSellerController::class, 'deleteBanner']);
    Route::match(['get', 'post'], '/dashboard-seller/store/banner/edit', [DashboardSellerController::class, 'editBanner']);
    
    Route::get("/dashboard-seller/product", [DashboardSellerController::class, 'product']);
    Route::match(['get', 'post'], '/dashboard-seller/product/create', [DashboardSellerController::class, 'createProduct']);
    Route::match(['get', 'post'], '/dashboard-seller/product/edit/{slug}', [DashboardSellerController::class, 'EditProduct']);
    Route::get("/dashboard-seller/product/delete/{slug}", [DashboardSellerController::class, 'deleteProduct']);
    Route::get("/dashboard-seller/product-image/{slug}", [DashboardSellerController::class, 'productImage']);
    Route::match(['get', 'post'], '/dashboard-seller/product-image/create/{slug}', [DashboardSellerController::class, 'createProductImage']);
    Route::match(['get', 'post'], '/dashboard-seller/product-image/edit/{slug}/{product_image_id}', [DashboardSellerController::class, 'editProductImage']);
    Route::get("/dashboard-seller/product-image/delete/{id}", [DashboardSellerController::class, 'deleteProductImage']);


});

Route::middleware(['customer-and-seller'])->group(function () {
    Route::get('/profile', [UserController::class, 'profilePage']);
    Route::match(['get', 'post'], '/profile/edit', [UserController::class, 'profileEdit']);
    Route::match(['get', 'post'], '/profile/change-password', [UserController::class, 'changePassword']);
    
});

Route::get('/store/{slug}', [StoreController::class, 'storePage']); 


