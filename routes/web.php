<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('blog', [PostController::class, 'index'])->name('blog');

Route::get('post/{id}', [PostController::class, 'view'])->name('blog.view');


Route::get('blog/create', [PostController::class, 'create'])->name('blog.create');
Route::post('blog/create', [PostController::class, 'save'])->name('blog.save');
Route::get('blog/{id}/delete', [PostController::class, 'delete'])->name('blog.delete');
Route::get('blog/{id}/edit', [PostController::class, 'edit'])->name('blog.edit');
Route::post('blog/{id}/edit', [PostController::class, 'update'])->name('blog.update');


Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');


