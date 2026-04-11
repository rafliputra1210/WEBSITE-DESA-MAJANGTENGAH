<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'category',
        'is_highlight',
        'published_at',
    ];

    protected $casts = [
        'is_highlight'  => 'boolean',
        'published_at'  => 'date',
    ];
}
