<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'menu_item_id',
        'quantity',
        'price'
    ];
     public function user()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع المنيو
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
