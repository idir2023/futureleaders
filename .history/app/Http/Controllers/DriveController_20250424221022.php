<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\DriveOption;
use Illuminate\Http\Request;

class DriveController extends Controller
{
    // Méthode pour afficher tous les enregistrements
    public function index()
    {
        $driveOptions = Drive::all();
        return view('drive_options.index', compact('driveOptions'));
    }

    // Méthode pour afficher le formulaire de création
    public function create()
    {
        return view('drive_options.create');
    }

    // Méthode pour enregistrer un nouvel enregistrement
    public function store(Request $request)
    {
        $request->validate([
            'drive_link' => 'required|url',
            'duration' => 'required|in:1 month,2 months',
        ]);

        DriveOption::create($request->all());

        return redirect()->route('drive_options.index');
    }

    // Méthode pour afficher un enregistrement spécifique
    public function show(DriveOption $driveOption)
    {
        return view('drive_options.show', compact('driveOption'));
    }

    // Méthode pour afficher le formulaire de modification
    public function edit(DriveOption $driveOption)
    {
        return view('drive_options.edit', compact('driveOption'));
    }

    // Méthode pour mettre à jour un enregistrement spécifique
    public function update(Request $request, DriveOption $driveOption)
    {
        $request->validate([
            'drive_link' => 'required|url',
            'duration' => 'required|in:1 month,2 months',
        ]);

        $driveOption->update($request->all());

        return redirect()->route('drive_options.index');
    }

    // Méthode pour supprimer un enregistrement
    public function destroy(DriveOption $driveOption)
    {
        $driveOption->delete();

        return redirect()->route('drive_options.index');
    }
}

