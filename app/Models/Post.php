<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static  function all()
    {
        return [
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
    }

    public static function find($slug): array // menambahakn tipe nya itu array pada argumen $slug
    {
        // kalo didalam method menggunakan static, maka kita untuk mengambil nilai 
        // method seperti all yang  didalam class sama,  harus menggunakan static, jika tidak menggunakan 
        // static maka menggunakan this untuk menggunkan method  didalam class yang sama.
        // return Arr::first(static::all(), function ($post) use ($slug) {
        //     return $post['slug'] == $slug;
        // });

        // kalo tidak ingin menggunakan use ($slug) namun menggunakan arrow funtion
        $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

        if (!$post) {
            abort(404);
        }

        return $post;
    }
}
