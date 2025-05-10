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
        $traders = Trader::paginate(5);
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
            // Save the file in public/templates
            $file = $request->file('file');
            $destinationPath = public_path('templates');
            $fileName = 'traders_template.xlsx';

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $fileName);

            // Import after saving
            Excel::import(new TradersImport, $destinationPath . '/' . $fileName);

            return redirect()->route('traders.index')->with('success', 'Données importées avec succès et fichier sauvegardé.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'importation: ' . $e->getMessage());
        }
    }


    public function exportTemplate()
    {
        return response()->download(public_path('templates/traders_template.xlsx'));
    }

    public function destroy($id)
    {
        $trader = Trader::findOrFail($id);

        // Delete the trader
        if ($trader->delete()) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 500);
    }
}
