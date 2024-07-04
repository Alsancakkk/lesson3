<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;

Route::get('/forum', [ForumController::class, 'index'])->name('forumhome');
Route::get('/createforum', [ForumController::class, 'create'])->name('forum.create');
Route::post('/addforum', [ForumController::class, 'store'])->name('forum.store');
Route::delete('/forum.{id}', [ForumController::class, 'destroy'])->name('forum.destroy');
Route::get('/forum.{id}.edit', [ForumController::class, 'edit'])->name('forum.edit');
Route::put('/forum.{id}.update', [ForumController::class, 'update'])->name('forum.update');



Route::get('/category', [CategoryController::class, 'index'])->name('categoryhome');
Route::get('/createcategory', [CategoryController::class, 'create'])->name('category.create');
Route::post('/addcategory', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/category.{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category.{id}.edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category.{id}.update', [CategoryController::class, 'update'])->name('category.update');
