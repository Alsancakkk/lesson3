<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForumController;

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/createcategories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');


Route::get('forums/create', [ForumController::class, 'create'])->name('forums.create');
Route::post('forums', [ForumController::class, 'store'])->name('forums.store');
