<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
        // Call the AdminUserSeeder to insert the admin user
        $this->call(AdminUserSeeder::class);
        // Call the CoachSeeder to insert the coach users
        $this->call(CoachSeeder::class);
     }
}
