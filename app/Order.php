<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_no', 'user_id', 'shipping_id', 'payment_id', 'total_price', 'status',
    ];

    public function items()
    {
        return $this->belongsToMany('App\Product', 'order_items', 'order_id', 'product_id')->withPivot('quantity', 'price');
    }
}
