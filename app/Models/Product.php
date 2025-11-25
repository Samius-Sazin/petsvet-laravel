<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'category',
        'sku',
        'price',
        'offer',
        'quantity',
        'sold',
        'rating',
        'reviews',
        'images',
        'tags',
        'is_active',
        'is_featured',
        'attributes',
    ];

    protected $casts = [
        'reviews' => 'array',
        'images' => 'array',
        'tags' => 'array',
        'attributes' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
        'offer' => 'decimal:2',
        'rating' => 'decimal:1',
    ];
}
