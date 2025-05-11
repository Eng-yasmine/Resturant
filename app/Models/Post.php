<?php

namespace App\Models;

use App\Employee\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
protected $fillable = [
        'title',
        'content',
        'image',
        'user_id',
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function imageUrl()
{
    return $this->image
        ? asset('storage/images/' . $this->image)
        : asset('storage/images/default.png');
}


}
