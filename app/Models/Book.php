<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'description',
        'cover',
        'stock',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(\App\Models\BookCategory::class, 'category_id');
    }
}


