@extends('admin.layouts.master')
@section('title', 'Dashboard')

@section('content')
    @if (auth()->user()->role === 'admin' || auth()->user()->role === 'coach')
        <div class="row">
            <!-- Coaches -->
            <div class="col-md-4 stretch-card grid-margin">
                <div class="aaa card text-dark ">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-2">Coaches</h4>
                            <h2 class="font-weight-bold">{{ $CoachesCount }}</h2>
                        </div>
                        <i class="typcn typcn-user-outline display-4"></i>
                    </div>
                </div>
            </div>

            <!-- Consultations -->
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card text-dark bg-pastel-green">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-2">Consultations</h4>
                            <h2 class="font-weight-bold">{{ $ConsultationsCount }}</h2>
                        </div>
                        <i class="typcn typcn-messages display-4"></i>
                    </div>
                </div>
            </div>

            <!-- Users -->
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card text-dark bg-pastel-rose">

                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-2">Utilisateurs</h4>
                            <h2 class="font-weight-bold">{{ $UsersCount }}</h2>
                        </div>
                        <i class="typcn typcn-group-outline display-4"></i>
                    </div>
                </div>
            </div>
        </div> <!-- End row for admin boxes -->

        <!-- Recent Consultations Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Consultations Récentes</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coach</th>
                                    <th>Problème</th>
                                    <th>Prix</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($Consultations->take(3) as $consultation)
                                    <tr>
                                        <td>{{ $consultation->name }}</td>
                                        <td>{{ $consultation->created_at->format('d/m/Y') }}</td>
                                        <td>{{ optional($consultation->coach)->nom ?? 'N/A' }}
                                            {{ optional($consultation->coach)->prenom ?? '' }}</td>
                                        </td>
                                        <td>{{ $consultation->probleme ?: 'Aucun problème' }}</td>
                                        <td>{{ $consultation->prix }} $</td>
                                        <td>
                                            @if ($consultation->paiement_status == 'payé')
                                                <span class="badge bg-success">Payé</span>
                                            @elseif($consultation->paiement_status == 'en attente')
                                                <span class="badge bg-warning text-dark">En attente</span>
                                            @else
                                                <span class="badge bg-secondary">Inconnu</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Aucune consultation récente.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- End of Recent Consultations Section -->
    @elseif(auth()->user()->role === 'user')
        <!-- Client Consultations Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Mes Consultations</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Nom Complet</th>
                                    <th>Date</th>
                                    <th>Prix</th>
                                    <th>Coach</th>
                                    <th>Numero de Coach</th>
                                    <th>Voir Drive</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($consultationsClient as $consultation)
                                    <tr>
                                        <td>{{ $consultation->name }}
                                        </td>
                                        <td>{{ $consultation->created_at ? $consultation->created_at->format('d/m/Y') : '-' }}
                                        </td>
                                        <td>{{ number_format($consultation->prix, 2) }} $</td>
                                        <td>{{ optional($consultation->coach)->nom ?? 'N/A' }}
                                            {{ optional($consultation->coach)->prenom ?? '' }}
                                        </td>
                                        <td>{{ optional($consultation->coach)->numero ?? 'N/A' }}

                                        </td>

                                        <td>
                                            @if ($consultation->drive_link && now()->lessThan($consultation->drive_link_expire_at))
                                                <a href="{{ $consultation->drive_link }}" target="_blank"
                                                    class="btn btn-sm btn-success"title="Voir le lien Google Drive">
                                                    Accéder au lien Drive
                                                </a>
                                                {{-- <small class="d-block text-muted">
                                                    Expire le {{ \Carbon\Carbon::parse($consultation->drive_link_expire_at)->format('d/m/Y') }}
                                                </small> --}}
                                            @elseif ($consultation->drive_link)
                                                <span class="text-danger fw-bold">Lien expiré</span>
                                            @else
                                                <span class="text-muted">Aucun lien disponible</span>
                                            @endif

                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Aucune consultation trouvée.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-3 d-flex justify-content-start align-items-center flex-column">
                <a class="btn btn-sm d-flex align-items-center" href="{{ route('home') }}"
                    style="background: linear-gradient(45deg, #cba075, #cba075); color: #fff; padding: 10px 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); transition: background 0.3s ease, transform 0.2s ease;">
                    <i class="typcn typcn-arrow-back mr-1"></i> Retour à l'accueil
                </a>
            </div>

            <!-- Button -->
            <div class="col-6 mt-3 d-flex justify-content-start align-items-center flex-column">
                <button type="button" class="btn btn-sm d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#confirmationModal"
                    style="background: linear-gradient(45deg, #ff7980, #ff8000); 
               color: #fff; 
               padding: 10px 20px; 
               border-radius: 5px; 
               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
               transition: background 0.3s ease, transform 0.2s ease;">
                    <i class="typcn typcn-credit-card me-2"></i>
                    Get Money or One Month Free
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content"
                        style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.3);">
                        <div class="modal-header"
                            style="background: linear-gradient(45deg, #ff7980, #ff8000); color: #fff;">
                            <h5 class="modal-title" id="confirmationModalLabel">
                                <i class="typcn typcn-warning-outline me-2"></i> Confirm Your Action
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center" style="padding: 30px; font-size: 1.1rem;">
                            <p>
                                Are you sure you want to withdraw
                                <strong style="color: #ff5722;">{{ number_format(auth()->user()->profit_user, 2) }}
                                    $</strong>
                                or get one month free access to the academy?
                            </p>
                        </div>
                        <div class="modal-footer d-flex justify-content-center gap-3 pb-4">
                            <!-- Withdraw Money -->
                            <a href="{{ route('getMoney', auth()->user()->id) }}" class="btn btn-outline-secondary px-4">
                                <i class="typcn typcn-arrow-back me-1"></i> Withdraw Money
                            </a>

                            <!-- Buy Month -->
                            <a href="{{ route('buyMonth', auth()->user()->id) }}" class="btn btn-success px-4"
                                style="background-color: #28a745; border: none;">
                                <i class="typcn typcn-tick me-1"></i> Get 1 Month Free
                            </a>
                        </div>
                    </div>
                </div>
            </div>




        </div>
        <!-- End of Client Consultations Section -->
    @endif

    @if (auth()->user()->role === 'coach')
        <div class="row">
            <!-- Button -->
            <div class="col-12 mt-3 d-flex justify-content-start align-items-center flex-column">
                <button type="button" class="btn btn-sm d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#confirmationModal"
                    style="background: linear-gradient(45deg, #ff7980, #ff8000); 
               color: #fff; 
               padding: 10px 20px; 
               border-radius: 5px; 
               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
               transition: background 0.3s ease, transform 0.2s ease;">
                    <i class="typcn typcn-credit-card me-2"></i>
                    Récupérer ma commission
                </button>
            </div>


            <!-- Modal de Confirmation - Get My Profit -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Confirmation de Retrait</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Fermer"></button>
                        </div>

                        <div class="modal-body">
                            <p>Êtes-vous sûr de vouloir récupérer votre commission ? Cette action déclenchera une demande de
                                retrait auprès de l'administrateur.</p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                            <!-- Modifier l'action du formulaire selon votre route -->
                            <form action="{{ route('get-profit', auth()->user()->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Oui, je confirme</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    @endif
    @if (auth()->user()->role === 'user' || auth()->user()->role === 'coach')
        <!-- User Information Section -->
        <div class="row">

            <!-- Back to Home Button -->
            <div class="col-12 mt-3 d-flex justify-content-start align-items-center flex-column">
                <div class="card shadow-sm border-0 w-100">
                    <div class="card-body">
                        <h4 class="card-title mb-4 fw-bold text-dark">Mes informations</h4>

                        <table class="table table-bordered table-striped">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col">Détail</th>
                                    <th scope="col">Information</th>
                                </tr>
                            </thead>
                            <tbody class="text-center text-dark">
                                <tr>
                                    <td><strong>Nom</strong></td>
                                    <td>{{ auth()->user()->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Téléphone</strong></td>
                                    <td>{{ auth()->user()->telephone ?? 'Non disponible' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Code promo</strong></td>
                                    <td>
                                        @php
                                            $coach = \App\Models\Coach::where('user_id', auth()->id())->first();
                                            $userCode = auth()->user()->code_promo ?? null;
                                            $coachCode = $coach?->code_promo ?? null;
                                        @endphp

                                        @if ($coachCode)
                                            <span class="badge bg-success">{{ $coachCode }}</span>
                                        @elseif ($userCode)
                                            <span class="badge bg-success">{{ $userCode }}</span>
                                        @else
                                            <span class="badge bg-secondary">Aucun code promo</span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td><strong>Mon profit</strong></td>
                                    <td>
                                        @php
                                            $totalProfit =
                                                (float) auth()->user()->profit_user +
                                                (float) auth()->user()->profit_user_transfer;
                                        @endphp

                                        <span class="badge {{ $totalProfit > 0 ? 'bg-success' : 'bg-secondary' }}">
                                            {{ number_format($totalProfit, 2) }} $
                                        </span>

                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Rank</strong></td>
                                    <td>
                                        @php
                                            $rank = auth()->user()->rank;
                                        @endphp

                                        @if ($rank)
                                            @if ($rank == 'Silver')
                                                {{-- <span class="badge bg-secondary">{{ $rank }}</span> --}}
                                                <img src="{{ asset('assets/silver.jpg') }}" alt="">
                                            @elseif ($rank == 'Gold')
                                                {{-- <span class="badge bg-warning">{{ $rank }}</span> --}}
                                                <img src="{{ asset('assets/gold.jpg') }}" alt="">
                                            @elseif ($rank == 'Diamond')
                                                {{-- <span class="badge bg-primary">{{ $rank }}</span> --}}
                                                <img src="{{ asset('assets/diamond.jpg') }}" alt="">
                                            @elseif ($rank == 'Master')
                                                {{-- <span class="badge bg-info">{{ $rank }}</span> --}}
                                                <img src="{{ asset('assets/master.jpg') }}" alt="">
                                            @else
                                                <span class="badge bg-secondary">Unranked</span>
                                            @endif
                                        @else
                                            <span class="badge bg-secondary">Unranked</span>
                                        @endif
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Optional hover effect -->
            <style>
                .btn:hover {
                    background: linear-gradient(45deg, #cba075, #cba075);
                    transform: scale(1.05);
                }
            </style>
        </div>
        <!-- End of User Information Section -->
    @endif
@endsection
<style>
    .aaa {
        background-color: #DE6C25FF;
        /* Soft beige/nude */
    }

    .bg-pastel-green {
        background-color: #b0e0a8;
        /* Pastel green */
    }

    .bg-pastel-rose {
        background-color: #f4c6c1;
        /* Pastel rose */
    }

    .text-dark {
        color: #2d2d2d;
        /* Dark text for better contrast */
    }

    .display-4 {
        font-size: 3rem;
    }
</style>
