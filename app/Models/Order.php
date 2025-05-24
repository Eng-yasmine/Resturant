<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
protected $fillable = [
    'total_price',
    'status',
    'user_id'
];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user(){
        
        return $this->belongsTo(User::class);
    }
}
