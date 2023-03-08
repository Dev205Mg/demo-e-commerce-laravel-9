<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingCartController;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/produits/{product:id}', [ProductController::class, 'show'])->name('products.show');    
    Route::get('/produits', [ProductController::class, 'index'])->name('products.index');  
    Route::get('/shoppingCart', ShoppingCartController::class)->name('cart.index');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');    
    Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.store');    
    Route::get('/admin/edit/{product:id}', [AdminController::class, 'edit'])->name('admin.edit');    
    Route::patch('/admin/{product:id}', [AdminController::class, 'update'])->name('admin.update');    
    Route::delete('/admin/destroy/{product:id}', [AdminController::class, 'destroy'])->name('admin.destroy');    
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
