<?php

namespace App\Models;

use App\Employee\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
