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
                        <table class="table table-bordered table-striped">
                            <thead>
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
                                        <td>{{ optional($consultation->coach)->nom ?? 'Aucun coach' }}
                                            {{ optional($consultation->coach)->prenom ?? 'Aucun coach' }}</td>
                                        </td>
                                        <td>
                                            @if ($consultation->paiement_status == 'payé')
                                                <span class="badge badge-success">Payé</span>
                                            @else
                                                <span class="badge badge-warning">En attente</span>
                                            @endif
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
                                            <button class="btn btn-sm btn-danger delete-consultation"
                                                data-id="{{ $consultation->id }}">
                                                <i class="typcn typcn-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Aucune consultation trouvée</td>
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
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete-consultation').click(function() {
                var consultationId = $(this).data('id');

                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    text: "Vous ne pourrez pas annuler cette action !",
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
                            success: function(result) {
                                $('button[data-id="' + consultationId + '"]').closest(
                                    'tr').remove();
                                Swal.fire('Supprimé !',
                                    'La consultation a été supprimée.', 'success');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
