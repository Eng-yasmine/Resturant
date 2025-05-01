<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function menu_items()
    {
        return $this->hasMany(MenuItem::class);
    }
}
