<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ["nama"  => "Muhamad Nur Syami"]);
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/contact', function () {
    return view('contact');
});
