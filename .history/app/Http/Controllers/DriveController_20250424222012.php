<?php

namespace App\Http\Controllers;

use App\Models\DriveOption;
use Illuminate\Http\Request;

class DriveController extends Controller
{
    // Méthode pour afficher tous les enregistrements
    public function index()
    {
        $driveOptions = Drive::all();  // Utilisation du modèle DriveOption
        return view('drive.index', compact('driveOptions'));
    }

    // Méthode pour afficher le formulaire de création
    public function create()
    {
        return view('drive.create');
    }

    // Méthode pour enregistrer un nouvel enregistrement
    public function store(Request $request)
    {
        $request->validate([
            'drive_link' => 'required|url',
            'duration' => 'required|in:1 month,2 months',
        ]);

        // Crée un nouvel enregistrement avec les données envoyées
        Drive::create($request->all());

        return redirect()->route('drive_options.index');
    }

    // Méthode pour afficher un enregistrement spécifique
    public function show(DriveOption $driveOption)
    {
        return view('drive.show', compact('driveOption')); // Vue 'drive.show'
    }

    // Méthode pour afficher le formulaire de modification
    public function edit(DriveOption $driveOption)
    {
        return view('drive.edit', compact('driveOption')); // Vue 'drive.edit'
    }

    // Méthode pour mettre à jour un enregistrement spécifique
    public function update(Request $request, DriveOption $driveOption)
    {
        $request->validate([
            'drive_link' => 'required|url',
            'duration' => 'required|in:1 month,2 months',
        ]);

        // Mise à jour de l'enregistrement avec les nouvelles données
        $driveOption->update($request->all());

        return redirect()->route('drive_options.index');
    }

    // Méthode pour supprimer un enregistrement
    public function destroy(DriveOption $driveOption)
    {
        $driveOption->delete(); // Suppression de l'enregistrement

        return redirect()->route('drive_options.index');
    }
}
