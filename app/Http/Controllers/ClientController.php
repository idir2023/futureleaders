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

    // public function StoreConsultation(Request $request)
    // {
    //     // Validation des données
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'prix' => 'required|numeric',
    //         'code_promo' => 'nullable|string|max:255',
    //     ]);

    //     // Vérifier le code promo si fourni
    //     $coach = null;
    //     if ($request->filled('code_promo')) {
    //         // Si le coach est trouvé, vous pouvez gérer la logique de réduction de prix ici
    //         $parrain = User::where('code_promo', $request->input('code_promo'))->first();

    //         // $parrain = User::where('code_promo', $request->code_parrainage)->first();
    //         $user = User::find(auth()->user()->id);
            
            
    //         $user->update([
    //            'parrain_id' => $parrain ? $parrain->id : null,
    //         ]);

            
    //         if ($parrain) {
    //             $coach = Coach::join('consultations', 'coaches.id', '=', 'consultations.coach_id')
    //                 ->where('consultations.user_id', $user->id)
    //                 ->select('coaches.*')
    //                 ->first();
    //         } else {
    //              $coach = Coach::where('code_promo', $request->input('code_promo'))->first();
    //         }

    //         // dd($coach);
    //         // Si le coach n'est pas trouvé, vous pouvez gérer cette situation, par exemple :
    //         if (!$coach) {
    //             return back()->with(['error' => 'Le code promo fourni est invalide.']);
    //         }
    //     }

    //     // Créer la consultation
    //     $consultation = new Consultation();
    //     $consultation->name = $request->input('name');  // Utilisation de 'nom' pour le champ 'name'
    //     $consultation->email = $request->input('email');
    //     $consultation->telephone = $request->input('telephone');
    //     $consultation->adresse = $request->input('adresse');
    //     $consultation->probleme = $request->input('probleme');
    //     $consultation->prix = $request->input('prix');
    //     $consultation->paiement_status = 'en attente'; // Par défaut, le statut de paiement est "en attente"
    //     $consultation->coach_id = $coach ? $coach->id : null; // Associer le coach si trouvé
    //     $consultation->user_id = auth()->user() ? auth()->user()->id : null; // Associer l'utilisateur connecté
    //     $consultation->registered_by = $parrain ? $parrain->id : null; // Enregistrer l'utilisateur connecté
    //     $consultation->save();

    //     // Retourner la vue avec la confirmation de la consultation et le coach si trouvé
    //     return view('consultations.complete_paiment', compact('coach', 'consultation')); // Vue pour la confirmation de la consultation
    // }

//     public function StoreConsultation(Request $request)
// {
//     // Validation des données
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|email|max:255',
//         'telephone' => 'nullable|string|max:20',
//         'adresse' => 'nullable|string|max:255',
//         'probleme' => 'nullable|string',
//         'prix' => 'required|numeric',
//         'code_promo' => 'nullable|string|max:255',
//     ]);

//     $user = auth()->user();
//     $parrain = null;
//     $coach = null;

//     // Vérification du code promo s'il est fourni
//     if ($request->filled('code_promo')) {
//         $parrain = User::where('code_promo', $request->input('code_promo'))->first();

//         if ($parrain) {
//             // Mettre à jour le parrain_id une seule fois s'il n'est pas encore défini
//             if (is_null($user->parrain_id)) {
//                 $user_profit = User::with('filleuls.filleuls')->find(auth()->id());
    
//                 $descendants = $this->getAllDescendants($user_profit);
            
//                 if (count($descendants) < 5) {
//                     $profit =  $request->input('prix') * 0.2;
//                 }elseif(count($descendants) >= 5 && count($descendants) < 10){
//                     $profit =  $request->input('prix') * 0.25;
//                 }elseif(count($descendants) >= 10 && count($descendants) < 25){
//                     $profit =  $request->input('prix') * 0.3;
//                 }elseif(count($descendants) >= 25 && count($descendants) < 50){
//                     $profit =  $request->input('prix') * 0.15;
//                 }elseif(count($descendants) >= 50 ){
//                     $profit =  $request->input('prix') * 0.30;
//                 }

//                 User::find($parrain->id)->update([
//                     'profit_user' => $parrain->profit + $profit,
//                 ]);

//                 $user->update([
//                     'parrain_id' => $parrain->id,
//                 ]);
//             }

//             // Rechercher un coach associé à ce parrain (optionnel selon ta logique métier)
//             $coach = Coach::join('consultations', 'coaches.id', '=', 'consultations.coach_id')
//                 ->where('consultations.user_id', $parrain->id)
//                 ->select('coaches.*')
//                 ->first();
//         } else {
//             // S'il n'est pas un user, voir s’il s’agit d’un coach avec ce code
//             $coach = Coach::where('code_promo', $request->input('code_promo'))->first();

//             if (!$coach) {
//                 return back()->with(['error' => 'Le code promo fourni est invalide.']);
//             }
//         }
//     }

//     // Création de la consultation
//     $consultation = new Consultation();
//     $consultation->name = $request->input('name');
//     $consultation->email = $request->input('email');
//     $consultation->telephone = $request->input('telephone');
//     $consultation->adresse = $request->input('adresse');
//     $consultation->probleme = $request->input('probleme');
//     $consultation->prix = $request->input('prix');
//     $consultation->paiement_status = 'en attente';
//     $consultation->coach_id = $coach ? $coach->id : null;
//     $consultation->user_id = $user ? $user->id : null;
//     $consultation->registered_by = $parrain ? $parrain->id : null;
//     $consultation->save();

//     return view('consultations.complete_paiment', compact('coach', 'consultation'));
// }

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
    $parrain = null;
    $coach = null;

    // 2. Si un code promo est fourni
    if ($request->filled('code_promo')) {
        $codePromo = $request->input('code_promo');

        // Chercher un utilisateur avec ce code
        $parrain = User::where('code_promo', $codePromo)->first();

        if ($parrain) {
            // Si le parrain n'a jamais été défini
            if (is_null($user->parrain_id)) {
                // Récupérer les descendants du parrain
                $descendants = $this->getAllDescendants($parrain);
                $nb = count($descendants);
                // Calcul du profit selon le nombre de filleuls
                if ($nb < 5) {
                    $profit = $request->prix * 0.20;
                } elseif ($nb < 10) {
                    $profit = $request->prix * 0.25;
                } elseif ($nb < 25) {
                    $profit = $request->prix * 0.30;
                } elseif ($nb < 50) {
                    $profit = $request->prix * 0.15;
                } else {
                    $profit = $request->prix * 0.30;
                }

                // Mise à jour du profit du parrain
                $parrain->update([
                    'profit_user' => $parrain->profit_user + $profit,
                ]);

                // Mise à jour du parrain de l'utilisateur
                $user->update([
                    'parrain_id' => $parrain->id,
                ]);
            }

            // Trouver un coach lié au parrain (facultatif)
            $coach = Coach::join('consultations', 'coaches.id', '=', 'consultations.coach_id')
                ->where('consultations.user_id', $parrain->id)
                ->select('coaches.*')
                ->first();

        } else {
            // Sinon, chercher un coach avec ce code promo
            $coach = Coach::where('code_promo', $codePromo)->first();
            $user->update([
                'parrain_id' => $coach->user_id,
            ]);
            if (!$coach) {
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
    $consultation->registered_by = $parrain?->id;
    $consultation->save();

    return view('consultations.complete_paiment', compact('coach', 'consultation'));
}



    // public function uploadRecu(Request $request, $id)
    // {
    //     // Validation du fichier
    //     $request->validate([
    //         'recu' => 'required|file|mimes:pdf,jpg,png,jpeg,gif,svg,webp,bmp,tiff,tga,psd',
    //     ]);

    //     // Trouver la consultation par ID
    //     $consultation = Consultation::findOrFail($id);

    //     if ($request->hasFile('recu')) {
    //         // Stocker le fichier dans 'public/recus' (accessible publiquement)
    //         $filePath = $request->file('recu')->store('recus', 'public');

    //         // Mettre à jour la base de données
    //         $consultation->recu = $filePath; // 'recus/filename.pdf'
    //         $consultation->paiement_status = 'payé';
    //         $consultation->save();

    //         // Envoi d'un email à tous les utilisateurs ayant le rôle 'admin'
    //         User::where('role', 'admin')->each(function ($user) use ($consultation) {
    //             Mail::to($user->email)->send(new ConsultationTerminer($consultation));
    //         });
    //         return redirect()->route('home')->with('success', 'Le reçu a été téléchargé avec succès!');
    //     }

    //     return back()->withErrors(['recu' => 'Veuillez télécharger un reçu valide.']);
    // }

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
            User::where('role', 'admin')->each(function ($user) use ($consultation) {
                Mail::to($user->email)->send(new ConsultationTerminer($consultation));
            });

              // Envoi d'un email au coach
            if ($consultation->coach) {
                Mail::to($consultation->coach->email)->send(new ConsultationTerminer($consultation));
            }
    
            return redirect()->route('home')->with('success', 'Le reçu a été téléchargé avec succès!');
        }
    
        return back()->withErrors(['recu' => 'Veuillez télécharger un reçu valide.']);
    }

    private function getAllDescendants($user)
    {
        $descendants = [];
    
        foreach ($user->filleuls as $filleul) {
            $descendants[] = $filleul;
            $descendants = array_merge($descendants, $this->getAllDescendants($filleul));
        }
    
        return $descendants;
    }
}
