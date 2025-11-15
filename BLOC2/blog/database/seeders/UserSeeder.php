<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Denis',
            'email' => 'denis@example.com',
            'password' => bcrypt('123456789'),
        ]);
        User::create([
            'name' => 'Santi',
            'email' => 'santi@example.com',
            'password' => bcrypt('1234567'),
        ]);
        User::create([
            'name' => 'Val',
            'email' => 'val@example.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
