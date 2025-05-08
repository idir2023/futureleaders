<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\BankAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CoachController extends Controller
{
    /**
     * Affiche la liste des coachs
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $coaches = Coach::paginate(5);
        return view('admin.coaches.index', compact('coaches'));
    }

    public function getRank()
    {
        $coachs = Coach::withCount([
            'consultations as clients_count' => function ($query) {
                $query->select(DB::raw('COUNT(DISTINCT user_id)'));
            }
        ])
            ->orderByDesc('clients_count')
            ->paginate(5);


        return view('admin.ranks.index', compact('coachs'));
    }


    // public function getClientsParraines($id)
    // {
    //     $clients = User::where('parrain_id', $id)->get();
    //     return response()->json(['clients' => $clients]);
    // }

    public function getClientsParraines($id)
{
    $clients = User::where('parrain_id', $id)
        ->get()
        ->map(function ($client) {
            return [
                'id' => $client->id,
                'name' => $client->name,
                'has_parrain' => User::where('parrain_id', $client->id)->exists(),
            ];
        });

    return response()->json(['clients' => $clients]);
}


    public function create()
    {
        return view('admin.coaches.create');
    }

    // Store a new coach in the database
    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:coaches,email',
            'numero' => 'nullable|string|max:15',
            'code_promo' => 'nullable|string|max:50',
            'date_naissance' => 'nullable|date',
            'ville' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:500',
            'password' => 'nullable|string|min:6',
            'bank_accounts' => 'nullable|array',
            'bank_accounts.*.bank_name' => 'nullable|string|max:255',
            'bank_accounts.*.rib' => 'nullable|string|max:50',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validated['nom'] . ' ' . $validated['prenom'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Attention! Il faut définir un mot de passe ici (provisoire ou demander à l'utilisateur)
            'role' => 'coach',
        ]);

        // Create the coach
        $coach = Coach::create([
            'user_id' => $user->id,
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'numero' => $validated['numero'] ?? null,
            'code_promo' => $validated['code_promo'] ?? null,
            'date_naissance' => $validated['date_naissance'] ?? null,
            'ville' => $validated['ville'] ?? null,
            'adresse' => $validated['adresse'] ?? null,
        ]);

        // Save the bank accounts if provided
        if ($request->has('bank_accounts')) {
            foreach ($validated['bank_accounts'] as $bankAccount) {
                if (!empty($bankAccount['bank_name']) && !empty($bankAccount['rib'])) {
                    BankAccount::create([
                        'coach_id' => $coach->id,
                        'bank_name' => $bankAccount['bank_name'],
                        'rib' => $bankAccount['rib'],
                    ]);
                }
            }
        }

        // Redirect to a success page or back to the form with a success message
        return redirect()->route('coaches.index')->with('success', 'Coach ajouté avec succès');
    }


    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:6']
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['success' => true]);
    }


    public function edit($id)
    {
        $coach = Coach::findOrFail($id);
        return view('admin.coaches.edit ', compact('coach'));
    }

    /**
     * Met à jour les informations d'un coach
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $coach = Coach::findOrFail($id);

        $validated = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('coaches')->ignore($coach->id)],
            'numero' => ['nullable', 'string', 'max:20'],
            'code_promo' => ['nullable', 'string', 'max:50'],
            'date_naissance' => ['nullable', 'date'],
            'ville' => ['nullable', 'string', 'max:255'],
            'adresse' => ['nullable', 'string'],
            'bank_accounts' => ['nullable', 'array'],
            'bank_accounts.*.bank_name' => ['nullable', 'string', 'max:255'],
            'bank_accounts.*.rib' => ['nullable', 'string', 'max:50'],
        ]);

        // Mise à jour du coach
        $coach->update([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'numero' => $validated['numero'] ?? null,
            'code_promo' => $validated['code_promo'] ?? null,
            'date_naissance' => $validated['date_naissance'] ?? null,
            'ville' => $validated['ville'] ?? null,
            'adresse' => $validated['adresse'] ?? null,
        ]);

        // Mise à jour de l'utilisateur lié (supposons que la relation est définie : $coach->user)
        if ($coach->user) {
            $coach->user->name = $validated['nom'] . ' ' . $validated['prenom'];
            $coach->user->email = $validated['email'];
            $coach->user->save();
        }

        // Mise à jour des comptes bancaires
        if (isset($validated['bank_accounts'])) {
            $coach->bankAccounts()->delete(); // Supprime les anciens
            foreach ($validated['bank_accounts'] as $account) {
                if (!empty($account['bank_name']) || !empty($account['rib'])) {
                    $coach->bankAccounts()->create([
                        'bank_name' => $account['bank_name'],
                        'rib' => $account['rib'],
                    ]);
                }
            }
        }

        return redirect()->route('coaches.index')
            ->with('success', 'Coach mis à jour avec succès.');
    }


    /**
     * Supprime un coach
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $coach = Coach::findOrFail($id);
        $coach->delete();

        return response()->json(['success' => true]);
    }
}
