<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ["title"  => "Home Page"]);
});
Route::get('/about', function () {
    return view('about',  ["title" => "About Page", "name"  => "Muhamad Nur Syami"]);
});
Route::get('/posts', function () {
    return view('posts', ["title"  => "Blog Page", 'posts' => [
        [
            'id' => 1,
            'slug' => "judul-artikel-1",
            'title' => "Judul artikel 1",
            'author' => "Syami",
            'body' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, sint necessitatibus?Autem in maxime
            repudiandae alias recusandae quidem. Molestias architecto eos, ducimus consectetur sunt placeat. Architecto
            eaque quos officiis atque asperiores eos blanditiis modi dolor, deleniti ratione delectus odit fugiat!"
        ],
        [
            'id' => 2,
            'slug' => "judul-artikel-2",
            'title' => "Judul artikel 2",
            'author' => "Budi",
            'body' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, sint necessitatibus?Autem in maxime
            repudiandae alias recusandae quidem. Molestias architecto eos, ducimus consectetur sunt placeat. Architecto
            eaque quos officiis atque asperiores eos blanditiis modi dolor, deleniti ratione delectus odit fugiat!"
        ],
    ]]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = [
        [
            'id' => 1,
            'slug' => "judul-artikel-1",
            'title' => "Judul artikel 1",
            'author' => "Syami",
            'body' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, sint necessitatibus?Autem in maxime
            repudiandae alias recusandae quidem. Molestias architecto eos, ducimus consectetur sunt placeat. Architecto
            eaque quos officiis atque asperiores eos blanditiis modi dolor, deleniti ratione delectus odit fugiat!"
        ],
        [
            'id' => 2,
            'slug' => "judul-artikel-2",
            'title' => "Judul artikel 2",
            'author' => "Budi",
            'body' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, sint necessitatibus?Autem in maxime
            repudiandae alias recusandae quidem. Molestias architecto eos, ducimus consectetur sunt placeat. Architecto
            eaque quos officiis atque asperiores eos blanditiis modi dolor, deleniti ratione delectus odit fugiat!"
        ],
    ];

    $post = Arr::first($posts, function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => "Single Post", 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ["title"  => "Contact Page"]);
});
