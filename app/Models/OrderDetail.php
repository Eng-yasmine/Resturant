<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    /** @use HasFactory<\Database\Factories\OrderDetailFactory> */
    use HasFactory;

protected $fillable = [
    'name',
    'price',
    'quantity',
    'quantity_price',
    'order_id',
];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function menuItem()
{
    return $this->belongsTo(MenuItem::class);
}

}
