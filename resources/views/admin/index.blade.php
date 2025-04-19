@extends('admin.layouts.master')
@section('title', 'Dashboard')

@section('content')
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
</div>

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
                                    @if($consultation->paiement_status == 'payé')
                                        <span class="badge bg-success">Payé</span>
                                    @elseif($consultation->paiement_status == 'en attente')
                                        <span class="badge bg-warning text-dark">En attente</span>
                                    @else
                                        <span class="badge bg-secondary">Inconnu</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center">Aucune consultation récente.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
