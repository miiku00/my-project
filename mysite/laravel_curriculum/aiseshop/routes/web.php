<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


Route::middleware('auth')->group(function () {
    Route::resource('shops', ShopController::class);

    Route::resource('shops.products', ProductController::class)
        ->except(['show']);
});

Route::get('/shops/{shop}/products/csv', [ProductController::class, 'exportCsv'])
    ->name('products.csv')
    ->middleware('auth');


Route::get('/shops/{shop}/products/{product}', [ProductController::class, 'show'])
    ->name('shops.products.show');

Route::get('/shops/{shop}/products', [ProductController::class, 'index'])
    ->name('shops.products.index');

Route::middleware('auth')->group(function () {
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::get('/cart/clear', function () {
    session()->forget('cart');
    return 'cleared';
});

Route::post('/cart/purchase', [CartController::class, 'purchase'])->name('cart.purchase');

Route::post('/cart/update/{productId}', [CartController::class, 'update'])->name('cart.update');

Route::get('/my-shops', [ShopController::class, 'myShops'])->middleware('auth')->name('shops.my');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');

Route::get('/purchases', [OrderController::class, 'index'])
    ->middleware('auth')
    ->name('purchases.index');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
})->name('hello');

Route::get('/text', function () {
    return 'これは文字列を返すルートです';
})->name('text_page');

Route::get('/form', function () {
    return view('form');
})->name('form');

Route::post('/form/submit', function (Request $request) {
    $name = $request->input('name');
    return "こんにちは、{$name}さん！";
})->name('form.submit');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';