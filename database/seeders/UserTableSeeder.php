<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'username' => 'admin1',
            'password' => bcrypt('12.DhhrF_23'),
            'isAdmin' => true,
        ]);

        
        User::factory()->count(4)->create();
    }
}
