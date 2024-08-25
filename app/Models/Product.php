<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
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
        'user_id',
        'brand_id',
    ];

    /**
     * Get the brand associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function brand(): belongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the user that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
