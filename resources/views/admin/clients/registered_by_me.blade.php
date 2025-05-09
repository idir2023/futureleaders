@extends('admin.layouts.master')

@section('title', 'Gestion des Clients')

@section('content')
    <div class="row">
        <div class="col-12">

            @php
                $count = count($descendants);
            @endphp

            @if ($count < 5)
                <div class="alert alert-info">
                    Vous avez le niveau <strong>Unranked</strong>. Continuez pour débloquer plus et d’avantages votre profit est <strong>20%</strong>!
                </div>
            @elseif ($count >= 5 && $count < 10)
                <div class="alert alert-success">
                    Vous avez le niveau <strong>Silver</strong> et votre profit est <strong>25%</strong>.
                </div>
            @elseif ($count >= 10 && $count < 25)
                <div class="alert alert-warning">
                    Vous avez le niveau <strong>Gold</strong> et votre profit est <strong>30%</strong>.
                </div>
            @elseif ($count >= 25 && $count < 50)
                <div class="alert alert-primary">
                    Vous avez le niveau <strong>Diamond</strong> et votre profit est <strong>35%</strong>.
                </div>
            @elseif ($count >= 50)
                <div class="alert alert-danger">
                    Vous avez le niveau <strong>Master</strong> avec un profit de <strong>30% avant</strong> et <strong>30% après</strong>.
                </div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="card-title mb-4" style="font-weight: bold; color: #333;">
                        Mes clients
                    </h4>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom complet</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Code promo</th>
                                    <th>Statut</th> <!-- Nouvelle colonne -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($descendants as $key => $client)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->telephone ?? 'Non disponible' }}</td>
                                        <td>
                                            @if ($client->code_promo)
                                                <span class="badge bg-success">{{ $client->code_promo }}</span>
                                            @else
                                                <span class="badge bg-secondary">Aucun code promo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-warning text-dark">Child</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            Aucun client trouvé.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
