<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CategoryController::class, 'index']);
Route::post('edit', [CategoryController::class, 'store'])->name('category.store');
