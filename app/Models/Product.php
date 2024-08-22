<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'brand_id',
        'description',
        'image',
        'short_description',
        'regular_price',
        'sale_price',
        'images',
        'SKU',
        'quantity',
        'stock_status',
        'featured',
        'product_category_id',
    ];
}
