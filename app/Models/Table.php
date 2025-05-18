<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    /** @use HasFactory<\Database\Factories\TableFactory> */
    use HasFactory;
    protected $fillable = [
        'table_number',
        'status',
        'seats',
    ];
   public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}
