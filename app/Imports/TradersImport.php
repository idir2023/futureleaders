<?php

 // app/Imports/TradersImport.php
namespace App\Imports;

use App\Models\Trader;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;

class TradersImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        return new Trader([
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
            'broker_commission' => 0, // Will be calculated or imported
            'academy_commission' => 0, // Will be calculated or imported
            'total_commission' => 0, // Will be calculated or imported
            'status' => 'Non valide', // Default
        ]);
    }

    private function transformDate($value)
    {
        if (!$value) {
            return null;
        }

        try {
            // Try to parse various date formats as seen in the Excel file
            if (strpos($value, '/') !== false) {
                // Format like 20/1/1996
                list($day, $month, $year) = explode('/', $value);
                return Carbon::createFromDate($year, $month, $day);
            } else {
                // Try to parse as Carbon can
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
            // Add other validation rules as needed
        ];
    }
}