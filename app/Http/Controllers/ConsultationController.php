<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConsultationController extends Controller
{
    /**
     * Affiche la liste des consultations.
     */
    public function index()
    {
        $consultations = Consultation::with('coach')->latest()->paginate(5);
        return view('admin.consultations.index', compact('consultations'));
    }

    /**
     * Enregistre une nouvelle consultation.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:consultations,email',
            'telephone' => 'nullable|string',
            'adresse' => 'nullable|string',
            'probleme' => 'required|string',
            'recu' => 'nullable|file|mimes:pdf,jpg,png,jpeg',
            'paiement_status' => 'required|in:en attente,payé',
            'coach_id' => 'nullable|exists:coaches,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('recu')) {
            $data['recu'] = $request->file('recu')->store('recus', 'public');
        }

        Consultation::create($data);

        return redirect()->route('consultations.index')->with('success', 'Consultation ajoutée avec succès.');
    }

    
    public function update(Request $request, $id)
    {
        $consultation = Consultation::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:consultations,email,' . $consultation->id,
            'telephone' => 'nullable|string',
            'adresse' => 'nullable|string',
            'probleme' => 'required|string',
            'recu' => 'nullable|file|mimes:pdf,jpg,png,jpeg',
            'paiement_status' => 'required|in:en attente,payé',
            'coach_id' => 'nullable|exists:coaches,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('recu')) {
            // Supprimer l'ancien fichier si existe
            if ($consultation->recu) {
                Storage::disk('public')->delete($consultation->recu);
            }
            $data['recu'] = $request->file('recu')->store('recus', 'public');
        }

        $consultation->update($data);

        return redirect()->route('consultations.index')->with('success', 'Consultation mise à jour avec succès.');
    }

    /**
     * Supprime une consultation.
     */
    public function destroy($id)
    {
        $consultation = Consultation::findOrFail($id);

        if ($consultation->recu) {
            Storage::disk('public')->delete($consultation->recu);
        }

        $consultation->delete();

        return response()->json(['success' => true]);
    }
}
