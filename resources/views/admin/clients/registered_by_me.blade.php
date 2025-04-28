@extends('admin.layouts.master')

@section('title', 'Gestion des Clients')

@section('content')
    <div class="row">
        <div class="col-12">
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
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clients as $key => $client)
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
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
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
