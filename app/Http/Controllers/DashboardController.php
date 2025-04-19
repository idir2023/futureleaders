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
        $consultationsClient = \App\Models\Consultation::where('user_id', auth()->user()->id)->get();
        // return view('admin.consultationClient', compact('consultations'));
        return view('admin.index', compact('Coaches', 'Consultations','consultationsClient', 'Users', 'CoachesCount', 'ConsultationsCount', 'UsersCount'));
    }
   
}
