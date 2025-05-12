<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pack;

class PackSeeder extends Seeder
{
    public function run()
    {
        // Insert Silver pack
        Pack::create([
            'name' => 'Silver',
            'image' => 'silver-rank.png', // Ensure the path is correct
            'duration_months' => 1,
            'price' => 89,
            'old_price' => 150,
            'has_inscription_fees' => false,
        ]);

        // Insert Gold pack
        Pack::create([
            'name' => 'Gold',
            'image' => 'gold-rank.png', // Ensure the path is correct
            'duration_months' => 3,
            'price' => 240,
            'old_price' => 270,
            'has_inscription_fees' => false,
        ]);
    }
}
