<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'product_stock',
        'product_sku'
    ];

    public function category() {
        return $this->belongsToMany(Category::class, 'product_categories')->using(ProductCategory::class);
    }

    public function attributeValue() {
        return $this->belongsToMany(AttributeValue::class, 'attributes_products')->using(AttributeProduct::class);
    }

    public function productImage() {
        return $this->belongsTo(ProductImage::class);
    }
}
