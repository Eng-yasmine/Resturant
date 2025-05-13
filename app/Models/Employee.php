<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\Employee\EmployyFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        // 'password',
        'phone',
        'gender',
        'national_ID',
        'image',
        'position',
        'user_id',
        'salary',
        'address',
        'date_of_birth',
        'start_date',

    ];
protected $hidden = [
        'password',

    ];
    // في ملف Employee.php (نموذج Employee)
public function user()
{
    return $this->belongsTo(User::class); // هذا يشير إلى أن الموظف ينتمي إلى مستخدم واحد
}

public function imageUrl()
{
    return $this->image
        ? asset('storage/images/' . $this->image)
        : asset('storage/images/default1.jpeg');
}

}
