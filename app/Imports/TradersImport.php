<?php

namespace App\Imports;

use App\Models\Trader;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TradersImport implements ToCollection, WithHeadingRow, WithValidation
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Créer un nouvel utilisateur
            $user = User::create([
                'name' => $row['name'] ?? null,
                'email' => $row['email'] ?? null,
                'telephone' => $row['n_telephone'] ?? null,
                'adresse' => $row['adresse'] ?? null,
                'password' => Hash::make('password'), // mot de passe par défaut sécurisé
                'profit_user' => $row['cimmission'] ?? 0,
                'rank' => $row['rank'] ?? 'Unranked',
                'role' => 'user',
            ]);

            // Créer le trader
            Trader::create([
                'name' => $row['name'] ?? null,
                'phone_number' => $row['n_telephone'] ?? null,
                'email' => $row['email'] ?? null,
                'address' => $row['adresse'] ?? null,
                'birthdate' => $this->transformDate($row['naissance']),
                'pack' => $row['pack'] ?? 'Non valide',
                'start_date' => $this->transformDate($row['date_debut']),
                'end_date' => $this->transformDate($row['date_fin']),
                'rank' => $row['rank'] ?? 'Unranked',
                'commission' => $row['cimmission'] ?? 0,
                'revenue' => $row['revenue'] ?? 0,
                'broker_commission' => 0,
                'academy_commission' => 0,
                'total_commission' => 0,
                'status' => 'Non valide',
                'user_id' => $user->id,
            ]);
        }
    }

    private function transformDate($value)
    {
        if (!$value) {
            return null;
        }

        try {
            if (strpos($value, '/') !== false) {
                list($day, $month, $year) = explode('/', $value);
                return Carbon::createFromDate($year, $month, $day);
            } else {
                return Carbon::parse($value);
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'n_telephone' => 'nullable',
            'email' => 'nullable|email',
        ];
    }
}
