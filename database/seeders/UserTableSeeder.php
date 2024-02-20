<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         

        Schema::table('user', function (Blueprint $table) {
            $table->string('image')->nullable();
        });
        
        

        User::create([
            'first_name' => 'Wanda',
            'last_name' => 'Maximoff',
            'email' => 'wanda@company.com',
            'username' => 'wanda1',
            'password' => Hash::make('12.DhhrF_23'),
            'isAdmin' => true,
            'image' => 'wanda.jpg'
        ]);

        $characters = [
            ['first_name' => 'Steve', 'last_name' => 'Rogers', 'username' => 'captain_america', 'password' => Hash::make('password')],
            ['first_name' => 'Tony', 'last_name' => 'Stark', 'username' => 'iron_man', 'password' => Hash::make('password')],
            ['first_name' => 'Thor', 'last_name' => 'Odinson', 'username' => 'thor', 'password' => Hash::make('password')],
            ['first_name' => 'Bruce', 'last_name' => 'Banner', 'username' => 'hulk', 'password' => Hash::make('password')],
            ['first_name' => 'Natasha', 'last_name' => 'Romanoff', 'username' => 'black_widow', 'password' => Hash::make('password')],
            ['first_name' => 'Peter', 'last_name' => 'Parker', 'username' => 'spider_man', 'password' => Hash::make('password')],
            ['first_name' => 'Clint', 'last_name' => 'Barton', 'username' => 'hawkeye', 'password' => Hash::make('password')],
            ['first_name' => 'Scott', 'last_name' => 'Lang', 'username' => 'ant_man', 'password' => Hash::make('password')],
            ['first_name' => 'Natasha', 'last_name' => 'Romanoff', 'username' => 'black_widow_2', 'password' => Hash::make('password')],
            ['first_name' => 'Bruce', 'last_name' => 'Wayne', 'username' => 'batman', 'password' => Hash::make('password')],
            ['first_name' => 'Clark', 'last_name' => 'Kent', 'username' => 'superman', 'password' => Hash::make('password')],
            ['first_name' => 'Barry', 'last_name' => 'Allen', 'username' => 'flash', 'password' => Hash::make('password')],
            ['first_name' => 'Hal', 'last_name' => 'Jordan', 'username' => 'green_lantern', 'password' => Hash::make('password')],
            ['first_name' => 'Arthur', 'last_name' => 'Curry', 'username' => 'aquaman', 'password' => Hash::make('password')],
            ['first_name' => 'Wanda', 'last_name' => 'Maximoff', 'username' => 'scarlet_witch_2', 'password' => Hash::make('password')],
            ['first_name' => 'Vision', 'last_name' => '', 'username' => 'vision', 'password' => Hash::make('password')],
            ['first_name' => 'War Machine', 'last_name' => '', 'username' => 'war_machine', 'password' => Hash::make('password')],
            ['first_name' => 'Batman', 'last_name' => '', 'username' => 'batman_2', 'password' => Hash::make('password')],
            ['first_name' => 'Superman', 'last_name' => '', 'username' => 'superman_2', 'password' => Hash::make('password')],
            ['first_name' => 'Flash', 'last_name' => '', 'username' => 'flash_2', 'password' => Hash::make('password')],
            ['first_name' => 'Green Lantern', 'last_name' => '', 'username' => 'green_lantern_2', 'password' => Hash::make('password')],
            ['first_name' => 'Aquaman', 'last_name' => '', 'username' => 'aquaman_2', 'password' => Hash::make('password')],
        ];
        
        
        
        foreach ($characters as $character) {

            $imagePath = strtolower($character['first_name']) . '.jpg';

            User::create([
                'first_name' => $character['first_name'],
                'last_name' => $character['last_name'],
                'email' => $character['username'] . '@example.com',
                'username' => $character['username'],
                'password' => $character['password'],
                'isAdmin' => false,
                'image' => $imagePath,
            ]);

        
        }
    }
}
