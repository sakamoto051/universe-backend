<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'sakamoto',
            'email' => 'sakamoto051eng@gmail.com',
            'my_point' => 30,
            'service_point' => 0,
            'password' => Hash::make('password'),
        ]);
        User::factory()->create([
            'name' => 'test',
            'email' => 'test@test.com',
            'my_point' => 100,
            'service_point' => 0,
            'password' => Hash::make('password'),
        ]);
        for ($i = 3; $i < 10; $i++) {
            User::factory()->create([
                'name' => 'test'.$i,
                'email' => 'test'.$i.'@test.com',
                'my_point' => 100,
                'service_point' => 0,
                'password' => Hash::make('password'),
            ]);
        }
    }
}
