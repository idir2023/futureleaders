<?php

namespace App\Http\Controllers;

use App\Exports\TradersExport;
use App\Models\Trader;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TradersImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


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
            // Récupérer le fichier
            $file = $request->file('file');

            // Nom unique pour éviter les conflits
            $fileName = 'traders_template_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Sauvegarde dans le dossier storage/app/templates
            $path = $file->storeAs('templates', $fileName);

            // Importer les données
            Excel::import(new TradersImport, storage_path('app/' . $path));

            return redirect()->route('traders.index')->with('success', 'Données importées avec succès et fichier sauvegardé.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'importation : ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        $trader = Trader::findOrFail($id);

        // Delete the related user if exists
        if ($trader->user) {
            $trader->user->delete();
        }

        // Delete the trader
        if ($trader->delete()) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 500);
    }
}
