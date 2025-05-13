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
            'price' => 90,
            'old_price' => 120,
            'has_inscription_fees' => false,
        ]);

        // Insert Gold pack
        Pack::create([
            'name' => 'Gold',
            'image' => 'gold-rank.png', // Ensure the path is correct
            'duration_months' => 3,
            'price' => 240,
            'old_price' => 399,
            'has_inscription_fees' => false,
        ]);
    }
}
