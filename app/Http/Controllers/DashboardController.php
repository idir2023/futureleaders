<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $Coaches = \App\Models\Coach::all();
        $Consultations = \App\Models\Consultation::latest()->get();
        $Users = \App\Models\User::all();

        $CoachesCount = $Coaches->count();
        $ConsultationsCount = $Consultations->count();
        $UsersCount = \App\Models\User::where('role', 'user')->count();
        $consultationsClient = \App\Models\Consultation::where('user_id', auth()->user()->id)->get();
        // return view('admin.consultationClient', compact('consultations'));
        return view('admin.index', compact('Coaches', 'Consultations', 'consultationsClient', 'Users', 'CoachesCount', 'ConsultationsCount', 'UsersCount'));
    }

    public function getUserRegisteredByMe()
    {
        // 1. Récupérer tous les utilisateurs liés à ce coach via consultations
        $clients = User::join('consultations', 'users.id', '=', 'consultations.user_id')
            ->where('consultations.registered_by', auth()->user()->id)
            ->select('users.*')
            ->get();

        return view('admin.clients.registered_by_me', compact('clients'));
    }
}
