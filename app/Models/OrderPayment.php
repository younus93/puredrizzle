<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{

	protected $table = 'users_order_payment';

    
    function user()
    {
        return $this->belongsTo(User::class);
    }


    function order()
    {
    	return $this->belongsTo(Order::class);
    }

}
