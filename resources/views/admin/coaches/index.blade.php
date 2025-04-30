@extends('admin.layouts.master')

@section('title', 'Gestion des Coachs')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Liste des Coachs</h4>
                    <a href="{{ route('coaches.create') }}" class="btn btn-warning">
                        <i class="fas fa-plus"></i> Ajouter un Coach
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Numéro</th>
                                    <th>Code Promo</th>
                                    <th>Date de naissance</th>
                                    <th>Comptes Bancaires</th>
                                    <th>Ville</th>
                                    <th>Adresse</th>
                                    <th>Mot de passe</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($coaches as $coach)
                                    <tr>
                                        <td>{{ $coach->nom }}</td>
                                        <td>{{ $coach->prenom }}</td>
                                        <td>{{ $coach->email }}</td>
                                        <td>{{ $coach->numero }}</td>
                                        <td>{{ $coach->code_promo }}</td>
                                        <td>{{ $coach->date_naissance }}</td>
                                        <td>
                                            @forelse($coach->bankAccounts as $account)
                                                <div>
                                                    <strong>{{ $account->bank_name }}</strong><br>
                                                    RIB: {{ $account->rib }}
                                                </div>
                                                <hr class="my-1">
                                            @empty
                                                -
                                            @endforelse
                                        </td>
                                        <td>{{ $coach->ville }}</td>
                                        <td>{{ $coach->adresse }}</td>
                                        <td>
                                            @if ($coach->user && $coach->user->password)
                                                <button class="btn btn-sm btn-warning change-password-btn"
                                                    data-user-id="{{ $coach->user->id }}"
                                                    data-user-name="{{ $coach->user->name }}">
                                                    🔒 Changer
                                                </button>
                                            @else
                                                <span class="text-muted">Aucun mot de passe</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('coaches.edit', $coach->id) }}" class="btn btn-sm btn-info">
                                                <i class="typcn typcn-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger delete-coach"
                                                data-id="{{ $coach->id }}">
                                                <i class="typcn typcn-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center">Aucun coach trouvé</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $coaches->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Changer Mot de Passe -->
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="changePasswordForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title">Changer le mot de passe pour <span id="passwordUserName"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="passwordUserId">
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Nouveau mot de passe</label>
                            <input type="password" class="form-control" id="newPassword" name="password" required minlength="6">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Changer</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const passwordModal = new bootstrap.Modal(document.getElementById('passwordModal'));

            document.querySelectorAll('.change-password-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    const userId = this.dataset.userId;
                    const userName = this.dataset.userName;

                    document.getElementById('passwordUserId').value = userId;
                    document.getElementById('passwordUserName').textContent = userName;
                    document.getElementById('newPassword').value = '';
                    passwordModal.show();
                });
            });

            document.getElementById('changePasswordForm').addEventListener('submit', function (e) {
                e.preventDefault();

                const userId = document.getElementById('passwordUserId').value;
                const password = document.getElementById('newPassword').value;

                fetch(`/coaches/${userId}/change-password`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ password })
                })
                .then(res => res.ok ? res.json() : Promise.reject())
                .then(data => {
                    Swal.fire('Succès', 'Mot de passe mis à jour', 'success');
                    passwordModal.hide();
                })
                .catch(() => {
                    Swal.fire('Erreur', 'Échec de la mise à jour du mot de passe.', 'error');
                });
            });

            $('.delete-coach').click(function () {
                const coachId = $(this).data('id');
                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    text: "Cette action est irréversible !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Oui, supprimer !',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/coaches/' + coachId,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function () {
                                $('button[data-id="' + coachId + '"]').closest('tr').remove();
                                Swal.fire('Supprimé !', 'Le coach a été supprimé.', 'success');
                            },
                            error: function () {
                                Swal.fire('Erreur !', 'Une erreur est survenue.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
