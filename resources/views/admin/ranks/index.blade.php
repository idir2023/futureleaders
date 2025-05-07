@extends('admin.layouts.master')

@section('title', 'Gestion des ranks')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow border-0">
                <div class="card-header bg-warning-100 text-white d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">🏆 Classement des Coachs</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th><i class="bi bi-person"></i> Coach</th>
                                    <th><i class="bi bi-envelope"></i> Email</th>
                                    <th><i class="bi bi-people"></i> Clients uniques</th>
                                    <th><i class="bi bi-trophy"></i> Rang</th>
                                    <th><i class="bi bi-person-lines-fill"></i> Clients Parrainés</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($coachs as $index => $coach)
                                    <tr>
                                        <td class="fw-bold">{{ $coachs->firstItem() + $index }}</td>
                                        <td>{{ $coach->nom }} {{ $coach->prenom }}</td>
                                        <td>{{ $coach->email }}</td>
                                        <td>
                                            <span class="badge bg-success px-3 py-2">
                                                {{ $coach->clients_count }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($coach->clients_count > 0)
                                                @switch($index)
                                                    @case(0)
                                                        <span class="badge bg-warning text-dark fs-6">🥇 1er</span>
                                                    @break

                                                    @case(1)
                                                        <span class="badge bg-secondary fs-6">🥈 2ème</span>
                                                    @break

                                                    @case(2)
                                                        <span class="badge bg-orange text-white fs-6">🥉 3ème</span>
                                                    @break

                                                    @default
                                                        <span
                                                            class="badge bg-light text-dark">{{ $index + 1 }}<sup>e</sup></span>
                                                @endswitch
                                            @else
                                                <span class="badge bg-light text-dark">Pas de rang</span>
                                            @endif
                                        </td>

                                        @php
                                            $clients = \App\Models\User::where('parrain_id', $coach->user_id)->get();
                                        @endphp

                                        <td class="text-start">
                                            @if ($clients->count() > 0)
                                                @foreach ($clients as $client)
                                                    <div class="mb-1">
                                                        <span class="badge bg-light text-dark">
                                                            {{ $client->name }}
                                                            @php
                                                                $clients_count = \App\Models\User::where('parrain_id', $client->id)->count();
                                                            @endphp
                                                        </span>
                                                        @if($clients_count > 0)
                                                        <a href="javascript:void(0)" class="show-parrain-modal"
                                                            data-user-id="{{ $client->id }}">
                                                            <span
                                                                style="color: #007bff; font-weight: bold; font-size: 1rem;">＋</span>
                                                        </a>
                                                        @endif

                                                        <!-- Contenu à afficher dynamiquement -->
                                                        <div id="parrain-content-{{ $client->id }}" class="mt-2 ms-3"
                                                            style="display: none;"></div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <span class="badge bg-light text-dark">Pas de clients parrainés</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-danger">Aucun coach trouvé</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $coachs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
    
    <script>
        $(document).ready(function () {
            var isProcessing = {};

            $(document).on('click', '.show-parrain-modal', function (e) {
                e.preventDefault();
                e.stopPropagation();

                var $this = $(this);
                let userId = $this.data('user-id');
                let targetDiv = $('#parrain-content-' + userId);

                // Empêche les requêtes multiples
                if (isProcessing[userId]) {
                    return;
                }

                // Si déjà visible, cacher et remettre le bouton à ＋
                if (targetDiv.is(':visible')) {
                    targetDiv.slideUp();
                    $this.find('span').text('＋');
                    return;
                } else {
                    $this.find('span').text('−');
                }

                isProcessing[userId] = true;
                targetDiv.html('<p class="text-muted">Chargement...</p>').slideDown();

                $.ajax({
                    url: '/ranks/' + userId + '/clients',
                    method: 'GET',
                    dataType: 'json',
                    cache: false,
                    success: function (data) {
                        if (data.clients && data.clients.length > 0) {
                            let html = '<ul class="list-group">';
                            data.clients.forEach(function (client) {
                                const clientId = client.id || '';
                                html += `
                                    <li class="list-group-item py-1 px-2 d-flex justify-content-between align-items-center">
                                        <span>${client.name || 'Sans nom'}</span>
                                        <a href="javascript:void(0)" class="show-parrain-modal" data-user-id="${clientId}">
                                            <span style="color: #007bff; font-weight: bold; font-size: 1rem;">＋</span>
                                        </a>
                                        <div id="parrain-content-${clientId}" class="mt-2 ms-3" style="display: none;"></div>
                                    </li>`;
                            });
                            html += '</ul>';
                            targetDiv.html(html);
                        } else {
                            targetDiv.html('<p class="text-muted">Aucun client parrainé trouvé.</p>');
                        }
                    },
                    error: function (xhr, status, error) {
                        targetDiv.html('<p class="text-danger">Erreur lors du chargement. Veuillez réessayer.</p>');
                    },
                    complete: function () {
                        isProcessing[userId] = false;
                    }
                });
            });
        });
    </script>
@endsection
 
