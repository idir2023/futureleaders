<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\Coach;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConsultationTerminer;
use App\Models\User;


class ClientController extends Controller
{
    // Afficher la page d'accueil
    public function index()
    {
        return view('index'); // Adapté à ta vue
    }

    // Afficher le formulaire de création de consultation
    public function CreateConsultation($price)
    {
        return view('consultations.create', compact('price')); // Vue pour la création de la consultation
    }

    public function StoreConsultation(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'prix' => 'required|numeric',
            'code_promo' => 'nullable|string|max:255',
        ]);

        // Vérifier le code promo si fourni
        $coach = null;
        if ($request->filled('code_promo')) {
            $coach = Coach::where('code_promo', $request->input('code_promo'))->first();

            // Si le coach n'est pas trouvé, vous pouvez gérer cette situation, par exemple :
            if (!$coach) {
                return back()->withErrors(['code_promo' => 'Le code promo fourni est invalide.']);
            }
        }

        // Créer la consultation
        $consultation = new Consultation();
        $consultation->name = $request->input('name');  // Utilisation de 'nom' pour le champ 'name'
        $consultation->email = $request->input('email');
        $consultation->telephone = $request->input('telephone');
        $consultation->adresse = $request->input('adresse');
        $consultation->probleme = $request->input('probleme');
        $consultation->prix = $request->input('prix');
        $consultation->paiement_status = 'en attente'; // Par défaut, le statut de paiement est "en attente"
        $consultation->coach_id = $coach ? $coach->id : null; // Associer le coach si trouvé
        $consultation->user_id = auth()->user() ? auth()->user()->id : null; // Associer l'utilisateur connecté
        $consultation->save();

        // Retourner la vue avec la confirmation de la consultation et le coach si trouvé
        return view('consultations.complete_paiment', compact('coach', 'consultation')); // Vue pour la confirmation de la consultation
    }

    public function uploadRecu(Request $request, $id)
    {
        // Validation du fichier
        $request->validate([
            'recu' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        // Trouver la consultation par ID
        $consultation = Consultation::findOrFail($id);

        if ($request->hasFile('recu')) {
            // Stocker le fichier dans 'public/recus' (accessible publiquement)
            $filePath = $request->file('recu')->store('recus', 'public');

            // Mettre à jour la base de données
            $consultation->recu = $filePath; // 'recus/filename.pdf'
            $consultation->paiement_status = 'payé';
            $consultation->save();

            // Envoi d'un email à tous les utilisateurs ayant le rôle 'admin'
            User::where('role', 'admin')->each(function ($user) use ($consultation) {
                Mail::to($user->email)->send(new ConsultationTerminer($consultation));
            });
            return redirect()->route('home')->with('success', 'Le reçu a été téléchargé avec succès!');
        }

        return back()->withErrors(['recu' => 'Veuillez télécharger un reçu valide.']);
    }
}
