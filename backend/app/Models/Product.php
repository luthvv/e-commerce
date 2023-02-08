<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'image',
        'name',
        'category',
        'sub_category',
        'brand',
        'price',
        'stock',
        'condition',
        'description',
        'variant',
        'weight',
        'promo',
        'rating',
        'sold',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function product_category()
    {
        return $this->belongsToMany(ProductCategory::class);
    }
    public function product_sub_category()
    {
        return $this->belongsTo(ProductSubCategory::class);
    }
}