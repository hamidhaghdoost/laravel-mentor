<?php

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

Route::get('post/{id}', function ($id) {
    return view('post', ['id' => $id]);
})->name('blog.view');
