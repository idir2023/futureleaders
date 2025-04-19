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
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Adresse</th>
                                    <th>Coach</th>
                                    <th>Statut Paiement</th>
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
                                            {{ optional($consultation->coach)->prenom ?? '' }}
                                        </td>
                                        <td>
                                            @if ($consultation->paiement_status == 'payé')
                                                <span class="badge bg-success">Payé</span>
                                            @else
                                                <span class="badge bg-warning text-dark">En attente</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($consultation->recu)
                                                <a href="{{ asset('storage/' . $consultation->recu) }}" target="_blank">
                                                    Voir le reçu
                                                </a>
                                            @else
                                                <span class="text-muted">Aucun</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-danger delete-consultation mb-1"
                                                data-id="{{ $consultation->id }}">
                                                <i class="typcn typcn-trash"></i>
                                            </button>

                                            <!-- Actions liées à l'envoi de lien/email -->
                                            <div class="d-flex flex-column gap-1">
                                                <!-- Email si tout payé -->
                                                <a href="mailto:{{ $consultation->email }}?subject=Consultation Confirmation&body=Bonjour {{ $consultation->name }},%0D%0A%0D%0AVotre consultation a bien été enregistrée. Merci de votre confiance.%0D%0ACordialement,%0D%0A"
                                                    class="btn btn-sm btn-primary">
                                                    Envoyer Email
                                                </a>

                                                <!-- Email si non payé -->
                                                <a href="javascript:void(0);"
                                                    class="btn btn-sm btn-secondary send-drive-link"
                                                    data-id="{{ $consultation->id }}">
                                                    Send Drive link
                                                </a>

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

    <!-- Modal -->
    <div class="modal fade" id="driveModal" tabindex="-1" aria-labelledby="driveModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="driveModalLabel">Ajouter un lien Google Drive</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="driveForm" action="{{ route('sendDrive') }}" method="POST">
                        @csrf
                        <input type="hidden" id="consultation_id" name="consultation_id">
                        <div class="mb-3">
                            <label for="drive_link" class="form-label">Lien Google Drive</label>
                            <input type="url" class="form-control" id="drive_link" name="drive_link" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer le lien</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Trigger the modal when the "Send Drive link" button is clicked
            $('.send-drive-link').click(function() {
                const consultationId = $(this).data('id');

                // Set the consultation ID in the hidden input field
                $('#consultation_id').val(consultationId);

                // Show the modal
                $('#driveModal').modal('show');
            });

            // Optionally, handle the form submission via AJAX if you prefer not to reload the page
            $('#driveForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function(response) {
                        Swal.fire('Success', 'Link has been sent successfully!', 'success');
                        $('#driveModal').modal('hide');
                    },
                    error: function() {
                        Swal.fire('Error', 'Something went wrong!', 'error');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.delete-consultation').click(function() {
                const consultationId = $(this).data('id');

                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    text: "Cette action est irréversible.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Oui, supprimer !',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/consultations/' + consultationId,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function() {
                                $('button[data-id="' + consultationId + '"]').closest(
                                    'tr').remove();
                                Swal.fire('Supprimé !',
                                    'La consultation a été supprimée.', 'success');
                            },
                            error: function() {
                                Swal.fire('Erreur',
                                    'Une erreur est survenue lors de la suppression.',
                                    'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
