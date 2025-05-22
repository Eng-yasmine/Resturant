<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\OrderDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        Menu::factory(2)->create();


        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            CategorySeeder::class,
            EmployeeSeeder::class,
            FeedbackSeeder::class,
            MenuSeeder::class,
            MenuItemSeeder::class,
            OrderDetailSeeder::class,
            OrderSeeder::class,

        ]);
    }
}
