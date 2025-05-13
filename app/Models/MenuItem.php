<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    /** @use HasFactory<\Database\Factories\MenuItemFactory> */
    use HasFactory;
protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function feedbacks()
    {
    return $this->hasMany(Feedback::class);
    }
    public function orderDetails(){
        return $this->belongsTo(OrderDetail::class);
    }
    public function imageUrl()
{
    return $this->image
        ? asset('storage/images/' . $this->image)
        : asset('storage/images/default.jpeg');
}

}
