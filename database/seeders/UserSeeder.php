<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin123'),
            'role' => 'administrator'
        ]);

        User::create([
            'name' => 'Kasir A',
            'email' => 'kasir@email.com',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir'
        ]);
    }
}
