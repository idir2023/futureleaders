<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    /**
     * Affiche la liste des coachs
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $coaches = Coach::paginate(10);
        return view('admin.coaches.index', compact('coaches'));
    }

    public function create()
    {
        return view('admin.coaches.create');
    }   
    /**
     * Enregistre un nouveau coach dans la base de données
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:coaches',
            'numero' => 'nullable|string|max:20',
            'code_promo' => 'nullable|string|max:50',
            'rib' => 'required|string|max:255',
            'ville' => 'nullable|string|max:255',
            'adresse' => 'nullable|string',
        ]);

        Coach::create($validated);

        return redirect()->route('coaches.index')
            ->with('success', 'Coach ajouté avec succès');
    }

    /**
     * Récupère les informations d'un coach pour l'édition
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $coach = Coach::findOrFail($id);
         return view('admin.coaches.edit ', compact('coach'));

    }

    /**
     * Met à jour les informations d'un coach
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $coach = Coach::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:coaches,email,'.$id,
            'numero' => 'nullable|string|max:20',
            'code_promo' => 'nullable|string|max:50',
            'rib' => 'required|string|max:255',
            'ville' => 'nullable|string|max:255',
            'adresse' => 'nullable|string',
        ]);

        $coach->update($validated);

        return redirect()->route('coaches.index')
            ->with('success', 'Coach mis à jour avec succès');
    }

    /**
     * Supprime un coach
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $coach = Coach::findOrFail($id);
        $coach->delete();

        return response()->json(['success' => true]);
    }
}