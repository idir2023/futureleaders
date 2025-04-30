<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an admin user
        User::create([
            'name' => 'Admin',
            'email' => 'Karim30merroun@gmail.com',
            'password' => Hash::make('Karimmerroun01'), // Utilise un mot de passe sécurisé en prod
            'role' => 'admin',
        ]);
    }
}
