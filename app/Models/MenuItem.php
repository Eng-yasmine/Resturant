<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    /** @use HasFactory<\Database\Factories\MenuItemFactory> */
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function feedbacks()
    {
    return $this->hasMany(Feedback::class);
    }

}
