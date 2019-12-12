<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $guarded = ['id'];

    public function productByAdmin()
    {
        //Product:created_by
        return $this->hasMany(Product::class);
    }

    public function productHistoryByAdmin()
    {
        return $this->hasMany(ProductHistory::class);
    }

    public function productImagesByAdmin()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function userLocations()
    {
        return $this->hasMany(UserLocation::class);
    }

    public function deliveryInformation()
    {
        return $this->hasMany(DeliveryInformation::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function orderPayment()
    {
        return $this->hasMany(OrderPayment::class);
    }

    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class);
    }

}