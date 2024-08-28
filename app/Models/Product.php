<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * The catRel that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function catRel(): BelongsToMany
    // {
    //     return $this->belongsToMany(ProductCategoryRel::class, 'product_id', 'id');
    //     // return $this->belongsToMany(Product::class);
    // }

    /**
     * Get the catRel associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function catRel(): HasOne
    // {
    //     return $this->hasOne(ProductCategoryRel::class);
    // }

    /**
     * Get all of the comments for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function catRel(): HasMany
    // {
    //     return $this->catRel( ProductCategoryRel::class );
    // }

    /**
     * Get all of the category for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function category(): HasMany
    // {
    //     return $this->hasMany(ProductCategoryRel::class);
    // }

     /**
     * The catRel that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category_rels' );
    }
    // public function category(): BelongsToMany
    // {
    //     return $this->belongsToMany(Category::class, 'product_categories' );
    // }
}
