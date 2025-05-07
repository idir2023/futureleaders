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
    
}
