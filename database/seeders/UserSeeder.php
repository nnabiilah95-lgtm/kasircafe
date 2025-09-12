<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
            'email' => 'admin@nescafe.com',
            'password' => Hash::make('admin1234'),
            'role' => 'administrator'
        ]);

        User::create([
            'name' => 'Kasir A',
            'email' => 'kasir@nescafe.com',
            'password' => Hash::make('kasir1234'),
            'role' => 'kasir'
        ]);
    }
}
