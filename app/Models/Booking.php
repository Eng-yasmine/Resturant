<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'booking_date',
        'booking_time',
        'table_id',
        'user_id',
        'status',
    ];
 public function user()
{
    return $this->belongsTo(User::class);
}

public function table()
{
    return $this->belongsTo(Table::class);
}

}
