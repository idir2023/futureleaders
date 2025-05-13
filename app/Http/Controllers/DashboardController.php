<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Coach;
use App\Models\Consultation;

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

        return redirect()->back()->with('success', 'Mois acheté avec succès.');
    }

    public function BuyMonth($id)
    {
        $user = User::findOrFail($id);

        $userProfit = (float) $user->profit_user;

        // Réinitialiser le profit de l'utilisateur
        $user->update([
            'profit_user' => 0,
        ]);

        // Récupérer le coach (parrain) associé
        $coach = User::find($user->parrain_id);

        if ($coach) {
            $coachProfit = (float) $coach->profit_user;
            $coach->update([
                'profit_user' => $coachProfit + $userProfit,
            ]);
        }

        // Rediriger vers une page avec message de succès
        return redirect()->back()->with('success', 'Mois acheté avec succès.');
    }
}
