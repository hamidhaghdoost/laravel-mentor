<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Home page";
});

Route::get('contact', function () {
    return "Contact page";
});

Route::get('about', function () {
    return "About page";
});
