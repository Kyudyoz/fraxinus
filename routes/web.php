<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WishlistController;

Route::get('/signup', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/signup', [RegisterController::class, 'store']);

Route::get('/signin', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/signin', [LoginController::class, 'login']);

Route::post('/signout', [LoginController::class, 'logout']);

Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);

Route::get('/show/{id}', [ProductController::class, 'show'])->middleware('auth');

Route::get('/show/{id}/edit', [ProductController::class, 'edit']);

Route::put('/show/{id}', [ProductController::class, 'update']);

Route::delete('/show/{id}', [ProductController::class, 'destroy']);

Route::get('/new', [ProductController::class, 'create'])->middleware('auth');

Route::post('/newproduct', [ProductController::class, 'store']);

Route::get('/wishlist', [HomeController::class, 'wishlist'])->middleware('auth');

Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy']);

Route::post('/wishlist/{id}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add')->middleware('auth');

Route::get('/user', [HomeController::class, 'user'])->middleware('auth');

//posts

Route::get('/posts', [PostController::class, 'index']);

Route::get('/create', [PostController::class, 'create'])->middleware('auth');

Route::post('/store', [PostController::class, 'store']);

Route::get('/posts/show/{id}', [PostController::class, 'show']);

Route::get('/posts/show/{id}/edit', [PostController::class, 'edit']);

Route::put('/posts/show/{id}/edit/update', [PostController::class, 'update']);

Route::delete('/posts/show/delete/{id}', [PostController::class, 'destroy']);
