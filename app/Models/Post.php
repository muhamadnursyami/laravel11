<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'authors', 'slug', 'body'];

    protected $with = ['author', 'category'];
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

    public function  scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            isset($filters['search']) ? $filters['search'] : false,
            fn ($query, $search) =>

            $query->where('title', 'like', '%' . $search . '%')
        );
        $query->when(
            isset($filters['category']) ? $filters['category'] : false,
            fn ($query, $category) =>
            $query->whereHas('category', fn ($query) => $query->where('slug', $category))
        );
        $query->when(
            isset($filters['author']) ? $filters['author'] : false,
            fn ($query, $author) =>
            $query->whereHas('author', fn ($query) => $query->where('username', $author))
        );
    }
}
