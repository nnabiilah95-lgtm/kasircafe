<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil UserSeeder
        $this->call(UserSeeder::class);

        // Kalau punya seeder lain bisa dipanggil juga:
        // $this->call(MenuSeeder::class);
        // $this->call(StokSeeder::class);
    }
}
