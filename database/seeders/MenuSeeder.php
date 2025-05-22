<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    Menu::factory()->createMany([
        [
            'name' => 'Foods',
            'status' => 'active'
        ],
        [
            'name' => 'Drinks',
            'status' => 'active'
        ]
    ]);




}}

