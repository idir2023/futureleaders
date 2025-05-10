<?php

namespace App\Http\Controllers;

use App\Models\Trader;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TradersImport;
use Illuminate\Support\Facades\Auth;

class TraderController extends Controller
{
    public function index()
    {
        $traders = Trader::all();
        $stats = [
            'total_revenue' => Trader::sum('revenue'),
            'broker_commission' => Trader::sum('broker_commission'),
            'academy_commission' => Trader::sum('academy_commission'),
            'total_commission' => Trader::sum('total_commission'),
        ];
        return view('admin.traders.index', compact('traders', 'stats'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new TradersImport, $request->file('file'));
            return redirect()->route('traders.index')->with('success', 'Données importées avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'importation: ' . $e->getMessage());
        }
    }

    public function exportTemplate()
    {
        return response()->download(public_path('templates/traders_template.xlsx'));
    }
}