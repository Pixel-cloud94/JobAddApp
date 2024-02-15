<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Education']);
        Category::create(['name' => 'Healthcare']);
        Category::create(['name' => 'Service Industry']);
        Category::create(['name' => 'Law and Government']);
        Category::create(['name' => 'Transportation']);
        Category::create(['name' => 'Communications']);
        Category::create(['name' => 'Finance']);
        Category::create(['name' => 'Technology']);
    }
}
