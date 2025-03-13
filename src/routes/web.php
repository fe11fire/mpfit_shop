<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;

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

// 

Route::get('/', CatalogController::class)->name('catalog');
Route::get('/catalog', CatalogController::class)->name('catalog');

Route::get('/product/{product:slug}', ProductController::class)->name('product');

Route::get('/product/change/new', [ProductController::class, 'changeNew'])->name('product.change.new');
Route::get('/product/change/update/{product:slug}', [ProductController::class, 'changeUpdate'])->name('product.change.update');

Route::delete('/product/{product:slug}', [ProductController::class, 'delete'])->name('product.delete');
Route::post('/product', [ProductController::class, 'create'])->name('product.create');
Route::put('/product/{product:slug}', [ProductController::class, 'update'])->name('product.update');
