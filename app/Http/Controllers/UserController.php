<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            // Récupérer tous les utilisateurs (clients) pour l'admin
            $clients = User::where('role', 'user')->latest()->paginate(10);
        } elseif (auth()->user()->role == 'coach') {
            // Récupérer les clients associés au coach authentifié
            $coach = Coach::where('user_id', auth()->user()->id)->first();
            $clients = User::join('consultations', 'users.id', '=', 'consultations.user_id')
                ->where('consultations.coach_id', $coach->id) // Filtrer par coach_id
                ->select('users.*')
                ->distinct() // Éviter les doublons si un client a plusieurs consultations
                ->paginate(10);
        } else {
            abort(403); // Forbidden access if not admin or coach
        }

        return view('admin.clients.index', compact('clients'));
    }

    // Method to add promo code to the user
    public function addPromoCode(Request $request, $clientId)
    {
        // Validate the promo code input
        $request->validate([
            'promo_code' => 'required|string|max:255',  // Adjust validation rules as needed
        ]);

        // Find the client by ID
        $client = User::findOrFail($clientId);

        // Example: Add the promo code to the client (you might store it in a `promo_codes` field or another table)
        $client->code_promo = $request->promo_code;  // Assuming there's a promo_code column in the users table

        // Save the updated client
        $client->save();

        // Redirect back with a success message
        return redirect()->route('clients.index')->with('success', 'Code promo ajouté avec succès.');
    }
}
