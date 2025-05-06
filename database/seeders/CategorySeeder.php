<?php

namespace Database\Seeders;


use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategorySeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    protected $fillable = ['name', 'menu_id', 'status'];
    public function run(): void
    {
        Category::factory()->count(30)->create();
    }
}
