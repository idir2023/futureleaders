<?php

namespace Database\Seeders;

use App\Models\Coach;
use App\Models\BankAccount;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    public function run(): void
    {
        $coaches = [
            [
                'nom' => 'Idir',
                'prenom' => 'Lahcen',
                'email' => 'lahcen.coach@example.com',
                'numero' => '0612345678',
                'code_promo' => 'PROMO2025',
                'ville' => 'Essaouira',
                'adresse' => 'Quartier industriel, Essaouira',
                'date_naissance' => Carbon::parse('2000-05-15'),
                'bank_name' => 'CIH Bank',
                'rib' => 'MA64000111110000000000000001',
            ],
            [
                'nom' => 'Benali',
                'prenom' => 'Sara',
                'email' => 'sara.coach@example.com',
                'numero' => '0623456789',
                'code_promo' => 'COACH2024',
                'ville' => 'Casablanca',
                'adresse' => 'Hay Hassani, Casablanca',
                'date_naissance' => Carbon::parse('1995-07-20'),
                'bank_name' => 'Attijariwafa Bank',
                'rib' => 'MA64000111110000000000000002',
            ],
            // Ajoute d'autres coachs ici...
        ];

        foreach ($coaches as $data) {
            $coach = Coach::create([
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'numero' => $data['numero'],
                'code_promo' => $data['code_promo'],
                'ville' => $data['ville'],
                'adresse' => $data['adresse'],
                'date_naissance' => $data['date_naissance'],
            ]);

            $coach->bankAccounts()->create([
                'bank_name' => $data['bank_name'],
                'rib' => $data['rib'],
            ]);
        }
    }
}
