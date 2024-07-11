<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    // Membuat Relasi Antar Model
    // 1 category punya banyak post
    // Makany HasMan
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
