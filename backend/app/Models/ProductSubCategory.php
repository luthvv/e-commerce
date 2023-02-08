<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'category',
    ];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
