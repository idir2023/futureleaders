@extends('admin.layouts.master')

@section('title', 'Gestion des Consultations')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Liste des Consultations</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        {{-- <table class="table table-bordered table-striped align-middle"> --}}
                     <table class="table table-hover table-striped table-bordered rounded shadow-sm">

                            <thead class="">
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Adresse</th>
                                    <th>Coach</th>
                                    <th>Paiement</th>
                                    <th>Reçu de Paiement</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($consultations as $consultation)
                                    <tr>
                                        <td>{{ $consultation->name }}</td>
                                        <td>{{ $consultation->email }}</td>
                                        <td>{{ $consultation->telephone }}</td>
                                        <td>{{ $consultation->adresse }}</td>
                                        <td>
                                            {{ optional($consultation->coach)->nom ?? 'Aucun' }}
                                            {{ optional($consultation->coach)->prenom }}
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $consultation->paiement_status === 'payé' ? 'bg-success' : 'bg-warning text-dark' }}">
                                                {{ $consultation->paiement_status === 'payé' ? 'Payé' : 'En attente' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($consultation->recu)
                                                <a href="{{ asset('storage/' . $consultation->recu) }}" target="_blank">Voir
                                                    le reçu</a>
                                            @else
                                                <span class="text-muted">Aucun</span>
                                            @endif
                                        </td>
                                        <td>
                                            
                                            <button class="btn btn-sm btn-danger delete-consultation mb-1"
                                                data-id="{{ $consultation->id }}">
                                                <i class="typcn typcn-trash"></i>
                                            </button>

                                            <div class="d-flex flex-column gap-1">
                                                <a href="#" class="btn btn-sm send-email-server"  style="background-color: #ffd9ab;"
                                                    data-id="{{ $consultation->id }}"
                                                    data-name="{{ $consultation->name }}">
                                                    <i class="typcn typcn-mail"></i>
                                                    Confirmation
                                                </a>
                                                <a href="#" class="btn btn-sm  send-email-server-1"style="background-color: #ffd9ab;"
                                                    data-id="{{ $consultation->id }}"
                                                    data-name="{{ $consultation->name }}">
                                                    <i class="typcn typcn-mail"></i>
                                                    Pas complet
                                                </a>

                                                @if (!$consultation->drive_link)
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm  send-drive-link"style="background-color: #ffd9ab;"
                                                        data-id="{{ $consultation->id }}">
                                                        <i class="typcn typcn-link-outline"></i>
                                                        Lien Drive
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm btn-success edit-drive-link"style="background-color: #ffd9ab;"
                                                        data-id="{{ $consultation->id }}"
                                                        data-drive="{{ $consultation->drive_link }}">
                                                        <i class="typcn typcn-link"></i>
                                                        Edit Lien Drive
                                                    </a>
                                                @endif

                                                <!-- Edit Drive Link Modal (placer en dehors de la boucle) -->
                                                <div class="modal fade" id="editDriveLinkModal" tabindex="-1"
                                                    role="dialog" aria-labelledby="editDriveLinkModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <form id="editDriveLinkForm" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editDriveLinkModalLabel">
                                                                        Modifier le lien Drive</h5>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Fermer">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="edit_drive_link">Lien Drive</label>
                                                                        <input type="url" class="form-control"
                                                                            id="edit_drive_link" name="drive_link" required>
                                                                    </div>
                                                                    <div class="form-group mt-2">
                                                                        <button type="submit"
                                                                            class="btn btn-success">Enregistrer</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{--  --}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Aucune consultation trouvée</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $consultations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Drive -->
    <div class="modal fade" id="driveModal" tabindex="-1" aria-labelledby="driveModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="driveForm" action="{{ route('sendDrive') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="driveModalLabel">Ajouter un lien Google Drive</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="consultation_id" name="consultation_id">

                    <div class="mb-3">
                        <label for="drive_link" class="form-label">Lien Google Drive</label>
                        <select class="form-select" id="drive_link" name="drive_link" required>
                            <option value="" disabled selected>Sélectionner un lien</option>
                            @foreach ($drives as $link)
                                <option value="{{ $link->drive_link }}">
                                    {{ $link->drive_link }} (Durée : {{ $link->duration }})
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Veuillez sélectionner un lien Google Drive parmi les options disponibles.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Envoyer le lien</button>
                </div>
            </form>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            // Modifier lien Drive
            $('.edit-drive-link').click(function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const link = $(this).data('drive');
                const form = $('#editDriveLinkForm');

                // Mettre le lien dans l'input
                $('#edit_drive_link').val(link);

                // Modifier l'action du formulaire
                form.attr('action', `/consultations/${id}/update-drive-link`);

                // Afficher le modal
                $('#editDriveLinkModal').modal('show');
            });

            // Suppression
            $('.delete-consultation').on('click', function() {
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    text: "Cette action est irréversible.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Oui, supprimer !',
                    cancelButtonText: 'Annuler'
                }).then(result => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/consultations/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: () => {
                                $(`button[data-id="${id}"]`).closest('tr').remove();
                                Swal.fire('Supprimé !',
                                    'La consultation a été supprimée.', 'success');
                            },
                            error: () => {
                                Swal.fire('Erreur', 'Une erreur est survenue.',
                                    'error');
                            }
                        });
                    }
                });
            });

            // Envoi Email
            $('.send-email-server').on('click', function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const name = $(this).data('name');

                Swal.fire({
                    title: 'Envoyer l\'email pour confirmer votre paiement complet et obtenir votre lien Drive dans votre tableau de bord sur notre plateforme ?',
                    text: `Voulez-vous vraiment envoyer un email à ${name} ?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Oui, envoyer',
                    cancelButtonText: 'Annuler'
                }).then(result => {
                    if (result.isConfirmed) {
                        $.post(`/send-email/${id}`, {
                                _token: '{{ csrf_token() }}'
                            })
                            .done(() => Swal.fire('Envoyé', 'Email envoyé avec succès.', 'success'))
                            .fail(() => Swal.fire('Erreur', 'Erreur lors de l\'envoi de l\'email.',
                                'error'));
                    }
                });
            });


            // Envoi Email pas complete paiement
            $('.send-email-server-1').on('click', function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const name = $(this).data('name');

                Swal.fire({
                    title: 'Envoyer l\'email, paiement non complet ou un problème existe ?',
                    text: `Voulez-vous vraiment envoyer un email à ${name} ?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Oui, envoyer',
                    cancelButtonText: 'Annuler'
                }).then(result => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/send-email-anyerror/${id}`,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function() {
                                Swal.fire('Envoyé', 'Email envoyé avec succès.',
                                    'success');
                            },
                            error: function() {
                                Swal.fire('Erreur',
                                    'Erreur lors de l\'envoi de l\'email.', 'error');
                            }
                        });
                    }
                });
            });

            // Ouvrir Modal Drive
            $('.send-drive-link').on('click', function() {
                const id = $(this).data('id');
                $('#consultation_id').val(id);
                $('#driveModal').modal('show');
            });

            // Envoi Drive AJAX
            $('#driveForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: () => {
                        Swal.fire('Succès', 'Lien envoyé avec succès !', 'success');
                        $('#driveModal').modal('hide');
                    },
                    error: () => {
                        Swal.fire('Erreur', 'Une erreur est survenue !', 'error');
                    }
                });
            });

        });
    </script>
@endsection
