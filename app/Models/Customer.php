<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
