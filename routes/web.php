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

// Ini adalah fitur search sederhana
Route::get('/posts', function () {
    // Kode yang aktif kode baru dengan search

    // untuk megecek apakah ada request atau tidak dihalaman /posts
    // dump(request('search'));



    // menggunakan eager loading untuk menangai masalah N+1 atau Lazy Loading
    // untuk menampilkan tulisan post paling baru menggunakan latest();
    //with() author dan category harus sesuai dengan model nya contoh disin adalah Model Post
    // $posts = Post::with(['author', 'category'])->latest()->get(); // bagusnya digunakan di modelnya saja
    // kode lama tanpa search
    // $posts = Post::latest()->get();

    return view('posts', ["title"  => "Blog Page", 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->get()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    return view('post', ['title' => "Single Post", 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    // Menggunakan Lazy Egaer Loading digunakan karena penggunaa with tidak bisa karena
    // parent nya udah digunakan,  di bagian code $user->posts
    // $posts = $user->posts->load('category', 'author'); // bagusnya digunakan di modelnya saja
    return view('posts', ['title' => count($user->posts) . " Artikel By " . $user->name, 'posts' => $user->posts]);
});
Route::get('/categories/{category:slug}', function (Category $category) {
    // Menggunakan Lazy Egaer Loading digunakan karena penggunaa with tidak bisa karena
    // parent nya udah digunakan,  di bagian code $category->posts
    // $posts = $category->posts->load('category', 'author'); // bagusnya digunakan di modelnya saja
    return view('posts', ['title' => " Artikel By Category " . $category->name, 'posts' => $category->posts]);
});
Route::get('/contact', function () {
    return view('contact', ["title"  => "Contact Page"]);
});
