<?php

namespace App\Http\Controllers;

use App\Models\Drive;
use Illuminate\Http\Request;

class DriveController extends Controller
{
    // Méthode pour afficher tous les enregistrements
    public function index()
    {
        $drives = Drive::all();  // Récupère tous les enregistrements
  
        return view('admin.drives.index', compact('drives'));

    }

    // Méthode pour afficher le formulaire de création
    public function create()
    {
        return view('admin.drives.create');
    }

    // Méthode pour enregistrer un nouvel enregistrement
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'drive_link' => 'required|url',
            'duration' => 'required|string|max:255',
        ]);

        // Créer un nouvel enregistrement dans la table drive
        Drive::create($request->all());

        // Redirection vers la page d'index avec un message de succès
        return redirect()->route('admin.drives.index')->with('success', 'Drive option created successfully.');
    }

    // Méthode pour afficher un enregistrement spécifique
    public function show(Drive $drive)
    {
        return view('admin.drives.show', compact('drive'));
    }

    // Méthode pour afficher le formulaire de modification
    public function edit(Drive $drive)
    {
    
        return view('admin.drives.edit', compact('drive'));

    }

    // Méthode pour mettre à jour un enregistrement spécifique
    public function update(Request $request, Drive $drive)
    {
        // Validation des données
        $request->validate([
            'drive_link' => 'required|url',
            'duration' => 'required|string|max:255',
        ]);

        // Mettre à jour l'enregistrement avec les nouvelles données
        $drive->update($request->all());

        // Redirection vers la page d'index avec un message de succès
        return redirect()->route('admin.drives.index')->with('success', 'Drive option updated successfully.');
    }

    // Méthode pour supprimer un enregistrement
    public function destroy(Drive $drive)
    {
        // Supprimer l'enregistrement
        $drive->delete();

        // Redirection vers la page d'index avec un message de succès
        return redirect()->route('admin.drives.index')->with('success', 'Drive option deleted successfully.');
    }

}
