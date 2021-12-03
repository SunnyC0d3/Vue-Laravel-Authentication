<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'billing_email',
        'billing_firstname',
        'billing_lastname',
        'billing_address',
        'billing_city',
        'billing_country',
        'billing_postalcode',
        'billing_phone',
        'billing_discount_code',
        'billing_subtotal',
        'billing_tax',
        'billing_total',
        'payment_gateway',
        'shipped',
        'error'
    ];

    public function orderProduct() {
        return $this->belongsTo(OrderProduct::class);
    }

}
