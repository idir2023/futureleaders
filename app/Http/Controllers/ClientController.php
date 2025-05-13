<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\Coach;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConsultationTerminer;
use App\Models\Pack;
use App\Models\User;


class ClientController extends Controller
{
    // Afficher la page d'accueil
    public function index()
    {
        $packs = Pack::all();
        return view('index', compact('packs')); // Adapté à ta vue
    }

    // Afficher le formulaire de création de consultation
    public function CreateConsultation($price)
    {
        return view('consultations.create', compact('price')); // Vue pour la création de la consultation
    }

    public function StoreConsultation(Request $request)
    {
        // 1. Validation des données reçues
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            'probleme' => 'nullable|string',
            'prix' => 'required|numeric',
            'code_promo' => 'nullable|string|max:255',
        ]);

        $user = auth()->user();
        $coach = null;

        // 2. Si un code promo est fourni
        if ($request->filled('code_promo')) {
            $codePromo = $request->input('code_promo');

            // Chercher un utilisateur avec ce code
            $parrain = User::where('code_promo', $codePromo)->first();

            if ($parrain && is_null($user->parrain_id)) {
                // Associer ce parrain à l'utilisateur
                $user->update(['parrain_id' => $parrain->id]);

                // Appliquer le profit au parrain et ses niveaux supérieurs
                $current = $parrain;
                $visited = [];

                while ($current && !in_array($current->id, $visited)) {
                    $visited[] = $current->id;

                    $descendants = $this->getAllDescendants($current);
                    $nb = count($descendants);

                    // Détermination du pourcentage de profit et du rang
                    if ($nb < 5) {
                        $profit = $request->prix * 0.20;
                        $rank = 'Unranked';
                    } elseif ($nb < 10) {
                        $profit = $request->prix * 0.25;
                        $rank = 'Silver';
                    } elseif ($nb < 25) {
                        $profit = $request->prix * 0.30;
                        $rank = 'Gold';
                    } elseif ($nb < 50) {
                        $profit = $request->prix * 0.15;
                        $rank = 'Diamond';
                    } else {
                        $profit = $request->prix * 0.30;
                        $rank = 'Master';
                    }

                    // Vérifier si le parrain est un coach
                    $coachUser = Coach::where('user_id', $current->id)->first();
                    if (!$coachUser) {
                        $current->update([
                            'profit_user' => $current->profit_user +  $profit,
                            'rank' => $rank,
                        ]);
                    }
                    $current = $current->parrain;
                }

                // Récupérer un coach lié au parrain
                $coach = Coach::join('consultations', 'coaches.id', '=', 'consultations.coach_id')
                    ->where('consultations.user_id', $parrain->id)
                    ->select('coaches.*')
                    ->first();
            }


            // Si aucun utilisateur trouvé avec ce code, chercher un coach directement
            if (!$parrain) {
                $coach = Coach::where('code_promo', $codePromo)->first();
                if ($coach) {
                    $user->update(['parrain_id' => $coach->user_id]);
                    // Appliquer le profit au coach
                    $userCoach = User::find($coach->user_id);
                    $userCoach->update([
                        'profit_user' => $userCoach->profit_user + $request->prix * 0.30,
                        'rank' => 'Master',
                    ]);
                } else {
                    return back()->with('error', 'Le code promo fourni est invalide.');
                }
            }
        }

        // 3. Création de la consultation
        $consultation = new Consultation();
        $consultation->name = $request->name;
        $consultation->email = $request->email;
        $consultation->telephone = $request->telephone;
        $consultation->adresse = $request->adresse;
        $consultation->probleme = $request->probleme;
        $consultation->prix = $request->prix;
        $consultation->paiement_status = 'en attente';
        $consultation->coach_id = $coach?->id;
        $consultation->user_id = $user->id;
        $consultation->save();

        return view('consultations.complete_paiment', compact('coach', 'consultation'));
    }


    public function uploadRecu(Request $request, $id)
    {
        // Validation du fichier
        $request->validate([
            'recu' => 'required|file|mimes:pdf,jpg,png,jpeg,gif,svg,webp,bmp,tiff,tga,psd',
        ]);

        // Trouver la consultation par ID
        $consultation = Consultation::findOrFail($id);

        if ($request->hasFile('recu')) {
            // Stocker le fichier dans storage/app/public/recus
            $filePath = $request->file('recu')->store('recus', 'public');

            // Chemins source et destination
            $sourcePath = storage_path('app/public/' . $filePath);
            $destinationPath = public_path('storage/' . $filePath);

            // Créer le dossier de destination si nécessaire
            if (!file_exists(dirname($destinationPath))) {
                mkdir(dirname($destinationPath), 0755, true);
            }

            // Copier manuellement le fichier vers public/storage/recus
            copy($sourcePath, $destinationPath);

            // Mise à jour de la base de données
            $consultation->recu = $filePath;
            $consultation->paiement_status = 'payé';
            $consultation->save();

            // Envoi d'un email aux admins
            // User::where('role', 'admin')->each(function ($user) use ($consultation) {
            //     Mail::to($user->email)->send(new ConsultationTerminer($consultation));
            // });

            // // Envoi d'un email au coach
            // if ($consultation->coach) {
            //     Mail::to($consultation->coach->email)->send(new ConsultationTerminer($consultation));
            // }

            return redirect()->route('home')->with('success', 'Le reçu a été téléchargé avec succès!');
        }

        return back()->withErrors(['recu' => 'Veuillez télécharger un reçu valide.']);
    }

    public function getAllDescendants($user)
    {
        $descendants = [];
        foreach ($user->filleuls as $filleul) {
            $descendants[] = $filleul;
            $descendants = array_merge($descendants, $this->getAllDescendants($filleul));
        }
        return $descendants;
    }
}
