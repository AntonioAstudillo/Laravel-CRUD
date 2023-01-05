<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\ProductsController::class, 'all'])->name('home');
Route::post('/products', [App\Http\Controllers\ProductsController::class, 'create'])->name('create');
Route::get('/edit/{id}', [App\Http\Controllers\ProductsController::class, 'edit'])->name('edit');
Route::put('/product/{id}', [App\Http\Controllers\ProductsController::class, 'update'])->name('update');
Route::delete('/product/{id}', [App\Http\Controllers\ProductsController::class, 'delete'])->name('delete');
