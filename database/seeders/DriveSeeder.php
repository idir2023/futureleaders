<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriveSeeder extends Seeder
{
    public function run()
    {
        // Insert some sample data into the 'drive' table
        DB::table('drive')->insert([
            [
                'drive_link' => 'https://example.com/drive1',
                'duration' => '2',
            ],
            [
                'drive_link' => 'https://example.com/drive2',
                'duration' => '3',
            ],
            [
                'drive_link' => 'https://example.com/drive3',
                'duration' => '1.5',
            ],
        ]);
    }
}
