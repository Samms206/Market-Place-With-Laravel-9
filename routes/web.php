<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthenticationController;
use App\Models\Order;
use Illuminate\Http\Request;

use App\Models\User;

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

Route::get('/', [ProductController::class, 'home']);
//login
Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
Route::post('/login', [AuthenticationController::class, 'auth']);
Route::get('/register', [AuthenticationController::class, 'register']);
Route::post('/register', [AuthenticationController::class, 'Authregister']);


Route::middleware(['auth'])->group(function () {
    //product
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products-seller', [ProductController::class, 'index_seller']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/add-product', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'delete']);

    //order
    Route::get('/view-product/{id}', [OrderController::class, 'create']);
    Route::get('/confirm-product/{id}', [OrderController::class, 'confirm']);
    Route::post('/order', [OrderController::class, 'store']);
    Route::get('/purchase', [OrderController::class, 'purchase']);

    //logout
    Route::get('/logout', [AuthenticationController::class, 'logout']);

    //category
    Route::get('/categories', [CategoryController::class, 'index']);

    //user
    Route::get('/profile', [UserController::class, 'index']);
    Route::get('/buyers', [UserController::class, 'index_buyer']);
    Route::get('/sellers', [UserController::class, 'index_seller']);
    Route::get('/orders', [OrderController::class, 'index']);
});



