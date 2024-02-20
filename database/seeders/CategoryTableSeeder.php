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
        // Create categories
        $categories = [
            ['name' => 'Technology'], // For TechMansion and StarkTech
            ['name' => 'Security'], // For S.H.I.E.L.D. Industries
            ['name' => 'Heroics'], // For The Avengers foundation
            ['name' => 'Entertainment'], // For Wayne Enterprises
            ['name' => 'Corporate'], // For LexCorp
            ['name' => 'Criminal'], // For Hydra Corp
            ['name' => 'Medical'], // For Arkham Asylum
            ['name' => 'Military'], // For Black Ops
            ['name' => 'Special Operations'], // For X-Force
            ['name' => 'Education'], // A general category for the purpose of this example
        ];
    
        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }    
}
