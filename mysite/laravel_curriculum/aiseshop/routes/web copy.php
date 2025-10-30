<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;

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

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
