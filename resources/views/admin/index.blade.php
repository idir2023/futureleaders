@extends('admin.layouts.master')
@section('title', 'Dashboard')

@section('content')
    @if (auth()->user()->is_admin)

        <div class="row">
            <!-- Coaches -->
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card text-white bg-primary">
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
                <div class="card text-white bg-success">
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
                <div class="card text-white bg-danger">
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
                                        <td>{{ optional($consultation->coach)->nom ?? 'N/A' }}</td>
                                        <td>{{ $consultation->probleme ?: 'Aucun problème' }}</td>
                                        <td>{{ $consultation->prix }} MAD</td>
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
    @else
        <!-- Client Consultations Section -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Mes Consultations</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Prix</th>
                                    <th>Coach</th>
                                    <th>Paiement</th>
                                    <th>Voir Drive</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($consultationsClient as $consultation)
                                    <tr>
                                        <td>{{ $consultation->created_at ? $consultation->created_at->format('d/m/Y') : '-' }}
                                        </td>
                                        <td>{{ number_format($consultation->prix, 2) }} MAD</td>
                                        <td>{{ optional($consultation->coach)->nom ?? 'N/A' }}
                                            {{ optional($consultation->coach)->prenom ?? '' }}</td>
                                        <td>
                                            @if ($consultation->paiement_status == 'payé')
                                                <span class="badge bg-success">Payé</span>
                                            @else
                                                <span class="badge bg-warning text-dark">En attente</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($consultation->drive_link)
                                                <a href="{{ $consultation->drive_link }}" target="_blank"
                                                    class="btn btn-info btn-sm mt-1" title="Voir le lien Google Drive">
                                                    <i class="typcn typcn-document-text"></i> Voir Drive
                                                </a>
                                            @else
                                                <span class="text-muted">Aucun lien</span>
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
            <!-- Back to Home Button -->
            <div class="col-12 mt-3 d-flex justify-content-start">
                <a class="btn btn-primary btn-sm d-flex align-items-center" href="{{ route('home') }}">
                    <i class="typcn typcn-arrow-back mr-1"></i> Retour à l'accueil
                </a>
            </div>
        </div> <!-- End of Client Consultations Section -->
    @endif

@endsection
