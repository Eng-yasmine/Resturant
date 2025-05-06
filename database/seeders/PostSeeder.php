<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    protected $fillable=['title','content','image','user_id'];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->count(30)->create();
    }
}
