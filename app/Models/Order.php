<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'name',
        'phone_number',
        'shipping_address',
        'postal_service',
        'payment_method',
        'total_amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getTotalPrice()
    {
        return $this->orderItems->sum(function ($item) {
            return $item->getTotalPrice();
        });
    }

    
}
