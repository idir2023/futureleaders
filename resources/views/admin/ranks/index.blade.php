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

                                        <td class="text-start">
                                            @forelse ($coach->parraineClients as $consultation)
                                                <a href="javascript:void(0)" class="show-parrain-modal"
                                                    data-user-id="{{ $consultation->user->id ?? 0 }}"
                                                    data-user-name="{{ $consultation->user->name ?? 'Non défini' }}">
                                                    <span class="badge bg-info text-dark d-inline-block mb-1">
                                                        {{ $consultation->user->name ?? 'Non défini' }}
                                                    </span>
                                                </a>
                                            @empty
                                                <span class="text-muted">Aucun</span>
                                            @endforelse
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

                    <!-- Modal -->
                    <div class="modal fade" id="parrainModal" tabindex="-1" aria-labelledby="parrainModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-warning text-white">
                                    <h5 class="modal-title" id="parrainModalLabel">Clients parrainés par <span
                                            id="modalClientName"></span></h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Fermer"></button>
                                </div>
                                <div class="modal-body" id="modalClientList">
                                    Chargement...
                                </div>
                            </div>
                        </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.show-parrain-modal').forEach(function(el) {
                el.addEventListener('click', function() {
                    const userId = this.dataset.userId;
                    const userName = this.dataset.userName;

                    document.getElementById('modalClientName').innerText = userName;
                    document.getElementById('modalClientList').innerHTML = 'Chargement...';

                    // Show modal
                    const modal = new bootstrap.Modal(document.getElementById('parrainModal'));
                    modal.show();

                    // Fetch parrainés
                    fetch(`/ranks/${userId}/clients`)
                        .then(res => res.json())
                        .then(data => {
                            if (data.length > 0) {
                                const list = data.map(client =>
                                    `<li>${client.name} (${client.email})</li>`).join('');
                                document.getElementById('modalClientList').innerHTML =
                                    `<ul>${list}</ul>`;
                            } else {
                                document.getElementById('modalClientList').innerHTML =
                                    `<p class="text-muted">Aucun client parrainé.</p>`;
                            }
                        })
                        .catch(err => {
                            document.getElementById('modalClientList').innerHTML =
                                `<p class="text-danger">Erreur lors du chargement.</p>`;
                        });
                });
            });
        });
    </script>
@endsection
