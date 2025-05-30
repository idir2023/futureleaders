<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Coach;
use App\Models\Consultation;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        // Définir des variables par défaut
        $Coaches = $Consultations = $Users = $consultationsClient = collect();
        $CoachesCount = $ConsultationsCount = $UsersCount = 0;

        // Récupérer les informations en fonction du rôle de l'utilisateur
        if (auth()->user()->role == 'admin') {
            // Récupérer toutes les données si l'utilisateur est admin
            $Coaches = Coach::all();
            $Consultations = Consultation::latest()->get();
            $Users = User::all();

            $CoachesCount = $Coaches->count();
            $ConsultationsCount = $Consultations->count();
            $UsersCount = User::where('role', 'user')->count();
        } elseif (auth()->user()->role == 'coach') {
            // Récupérer les données spécifiques à un coach
            $Coaches = Coach::where('user_id', auth()->user()->id)->get();
            $Consultations = Consultation::join('coaches', 'consultations.coach_id', '=', 'coaches.id')
                ->where('coaches.user_id', auth()->user()->id)
                ->get();
            $Users = User::where('id', auth()->user()->id)->get();

            $CoachesCount = $Coaches->count();
            $ConsultationsCount = $Consultations->count();
            $UsersCount = User::where('role', 'user')->count();
        }

        $consultationsClient = Consultation::where('user_id', auth()->user()->id)->get();


        // Retourner la vue avec les données appropriées
        return view('admin.index', compact('Coaches', 'Consultations', 'consultationsClient', 'Users', 'CoachesCount', 'ConsultationsCount', 'UsersCount'));
    }

    public function getUserRegisteredByMe()
    {
        $user = User::with('filleuls.filleuls')->find(auth()->id());

        $descendants = $this->getAllDescendants($user);

        return view('admin.clients.registered_by_me', compact('user', 'descendants'));
    }

    // Fonction récursive pour récupérer tous les filleuls (directs et indirects)
    private function getAllDescendants($user)
    {
        $descendants = [];

        foreach ($user->filleuls as $filleul) {
            $descendants[] = $filleul;
            $descendants = array_merge($descendants, $this->getAllDescendants($filleul));
        }

        return $descendants;
    }

    public function getMoney($id)
    {
        // Récupérer le client en fonction de l'id
        $client = User::find($id);

        // Vérifier si le client existe
        if ($client) {
            // Vous pouvez ajouter des logiques ici, par exemple, vérifier si le client est éligible pour recevoir de l'argent.

            // Redirection avec message de succès
            return redirect()->back()->with('success', 'Tu vas recevoir ton argent bientôt.');
        }

        // Si le client n'est pas trouvé
        return redirect()->back()->with('error', 'Client introuvable.');
    }

    public function BuyMonth($id)
    {
        // Trouver l'utilisateur concerné
        $user = User::findOrFail($id);

        // Récupérer et convertir son profit en float
        $userProfit = (float) $user->profit_user;

        // Réinitialiser le profit de l'utilisateur et activer l'achat du mois
        $user->update([
            'profit_user' => 0,
            'buy_month' => true
        ]);

        // Récupérer le coach via la table des consultations
        $coach = Consultation::join('coaches', 'consultations.coach_id', '=', 'coaches.id')
            ->where('consultations.user_id', $user->parrain_id)
            ->select('coaches.user_id') // on ne récupère que l'user_id du coach
            ->first();

        if ($coach && $coach->user_id) {
            // Trouver le coach dans la table users
            $userCoach = User::find($coach->user_id);

            if ($userCoach) {
                // Ajouter le profit de l'utilisateur au coach
                $userCoach->update([
                    'profit_user_transfer' => $userProfit,
                ]);
            }
        }

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Mois acheté avec succès.');
    }


    public function getProfit($id)
    {
        $users = User::where('parrain_id', $id)->get();
        $coach = User::find($id);

        $totalProfit = 0;

        foreach ($users as $user) {
            $totalProfit += $user->profit_user * 0.3;
        }

        if ($coach) {
            $coach->update([
                'profit_user' => $totalProfit
            ]);
        }

        return redirect()->back()->with('success', 'Votre profit a été mis à jour avec succès.');
    }


    public function getProfitAdmin($id)
    {
        // Récupérer le total des profits de tous les coachs
        $total_profit = User::where('role', 'coach')
            ->sum(DB::raw('profit_user + profit_user_transfer'));

        // Trouver l'utilisateur admin
        $adminUser = User::find($id);

        // Vérifier si l'utilisateur existe
        if ($adminUser) {
            $adminUser->update([
                'profit_user' => $total_profit * 0.3, // 30% de commission
            ]);

            return redirect()->back()->with('success', 'Votre profit a été mis à jour avec succès.');
        }

        return redirect()->back()->with('error', 'Admin not found.');
    }

    public function updatePromoCode(Request $request, $id)
    {
        $request->validate([
            'promo_code' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->code_promo = $request->promo_code; // Assuming your User model has a promo_code field
        $user->save();

        return redirect()->back()->with('success', 'Code promo mis à jour avec succès.');
    }
}
