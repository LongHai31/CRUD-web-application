<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['role:admin'])->group(function($route) {
    $route->resource('users', UserController::class );
    Route::resource('products', ProductController::class);
});
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
Route::prefix('/auth')->group(function($route) {
    $route->post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
    $route->post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
})->name('auth.');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');