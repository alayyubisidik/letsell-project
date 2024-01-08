<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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
    Route::match(['get', 'post'], '/login', [AuthController::class, 'login']);
    Route::match(['get', 'post'], '/register', [AuthController::class, 'register']);
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/dashboard', function() {
        return view('dashboard.index');
    });

    Route::match(['get', 'post'], '/profile/edit', [UserController::class, 'profileEdit']);

    Route::get('/dashboard/user', [UserController::class, 'dashboardUserPage']);
    Route::post('/dashboard/user/approve-the-user', [UserController::class, 'approveTheUser']);

    Route::get('/dashboard/product', [ProductController::class, 'dashboardProductPage']);
    
});

Route::middleware(['role:customer'])->group(function () {
    Route::get('/profile', [UserController::class, 'profilePage']);
    Route::match(['get', 'post'], '/profile/edit', [UserController::class, 'profileEdit']);
    Route::match(['get', 'post'], '/profile/change-password', [UserController::class, 'changePassword']);
});

