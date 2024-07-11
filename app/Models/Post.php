<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'authors', 'slug', 'body'];

    // Menghubungkan Antara Model Post dan Model User
    // yaitu kita mau tau tulisan post ini di tulis oleh siapa
    public function  author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    // Relasi Antar Model Post dan Model Category
    // 1 post itu punya 1 categories
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
