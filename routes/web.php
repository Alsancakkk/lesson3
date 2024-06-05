<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', [CategoryController::class, 'index'])->name('home');
Route::get('/createcategory', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/category', [CategoryController::class, 'store'])->name('categories.store');
