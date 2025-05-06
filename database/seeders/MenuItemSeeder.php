<?php

namespace Database\Seeders;

use App\MenuItem;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuItemSeeder extends Seeder
{
    protected $fillable=['name','description','image','status','price','category_id'];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuItem::factory()->count(30)->create();
    }
}
