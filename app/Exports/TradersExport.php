<?php

namespace App\Exports;

use App\Models\Trader;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TradersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Trader::all([
            'name', 'phone_number', 'email', 'address', 'birthdate', 'pack',
            'start_date', 'end_date', 'rank', 'commission', 'revenue'
        ]);
    }

    public function headings(): array
    {
        return [
            'Nom', 'Téléphone', 'Email', 'Adresse', 'Naissance',
            'Pack', 'Date début', 'Date fin', 'Rank', 'Commission', 'Revenue'
        ];
    }
}
