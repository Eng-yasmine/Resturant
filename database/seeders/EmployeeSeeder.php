<?php

namespace Database\Seeders;

use App\Employee\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Laravel\Sanctum\HasApiTokens;

class EmployeeSeeder extends Seeder
{
    use HasFactory;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory()->count(30)->create();
    }
}
