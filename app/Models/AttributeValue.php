<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $table = 'attributes_value';

    protected $fillable =[
        'attribute_value'
    ];

    public function attribute() {
        return $this->hasMany(Attribute::class, 'id');
    }

    public function product() {
        return $this->belongsToMany(Product::class, 'attributes_products')->using(AttributeProduct::class);
    }

}
