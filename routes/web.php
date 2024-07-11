<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('home', ["title"  => "Home Page"]);
});
Route::get('/about', function () {
    return view('about',  ["title" => "About Page", "name"  => "Muhamad Nur Syami"]);
});
Route::get('/posts', function () {
    return view('posts', ["title"  => "Blog Page", 'posts' => Post::all()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    return view('post', ['title' => "Single Post", 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {

    return view('posts', ['title' => count($user->posts) . " Artikel By " . $user->name, 'posts' => $user->posts]);
});
Route::get('/categories/{category:slug}', function (Category $category) {

    return view('posts', ['title' => " Artikel By Category " . $category->name, 'posts' => $category->posts]);
});
Route::get('/contact', function () {
    return view('contact', ["title"  => "Contact Page"]);
});
