<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{

	protected $table = 'users_order_products';

    
    function user()
    {
        return $this->belongsTo(User::class);
    }

    function product()
    {
        return $this->belongsTo(Product::class);
    }

    function order()
    {
    	return $this->belongsTo(Order::class);
    }

}