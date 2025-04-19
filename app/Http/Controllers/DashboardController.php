<?php

namespace App\Http\Controllers;

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
        $UsersCount = $Users->count();
    
        return view('admin.index', compact('Coaches', 'Consultations', 'Users', 'CoachesCount', 'ConsultationsCount', 'UsersCount'));
    }
    
}
