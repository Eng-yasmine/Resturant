<?php

namespace App\Employee;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\Employee\EmployyFactory> */
    use HasFactory;

    // public function posts()
    // {
    //     return $this->hasMany(Post::class);
    // }


}
