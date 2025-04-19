<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coach;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coach::create([
            'nom' => 'Idir',
            'prenom' => 'Lahcen',
            'email' => 'lahcen.coach@example.com',
            'numero' => '0612345678',
            'code_promo' => 'PROMO2025',
            'rib' => 'MA640001100090000000013333',
            'ville' => 'Essaouira',
            'adresse' => 'Quartier industriel, Essaouira',
        ]);

        Coach::create([
            'nom' => 'Benali',
            'prenom' => 'Sara',
            'email' => 'sara.coach@example.com',
            'numero' => '0623456789',
            'code_promo' => 'COACH2024',
            'rib' => 'MA640001100090000000045678',
            'ville' => 'Casablanca',
            'adresse' => 'Hay Hassani, Casablanca',
        ]);

        Coach::create([
            'nom' => 'Toufik',
            'prenom' => 'Yassine',
            'email' => 'yassine.toufik@example.com',
            'numero' => '0678945612',
            'code_promo' => 'DEAL2025',
            'rib' => 'MA640001100090000000078912',
            'ville' => 'Rabat',
            'adresse' => 'Avenue Hassan II, Rabat',
        ]);

        Coach::create([
            'nom' => 'El Amrani',
            'prenom' => 'Nour',
            'email' => 'nour.amrani@example.com',
            'numero' => '0654321876',
            'code_promo' => 'COACH20',
            'rib' => 'MA640001100090000000011112',
            'ville' => 'Agadir',
            'adresse' => 'Cité des Dunes, Agadir',
        ]);

        Coach::create([
            'nom' => 'Fadel',
            'prenom' => 'Rachid',
            'email' => 'rachid.fadel@example.com',
            'numero' => '0634567890',
            'code_promo' => 'COACH2025',
            'rib' => 'MA640001100090000000099988',
            'ville' => 'Tanger',
            'adresse' => 'Bd Mohamed V, Tanger',
        ]);
    }
}
