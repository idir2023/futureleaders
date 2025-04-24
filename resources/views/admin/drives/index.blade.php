@extends('admin.layouts.master')

@section('title', 'Gestion des Drives')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Liste des Drives</h4>
                <a href="{{ route('drives.create') }}" class="btn btn-warning">
                    <i class="fas fa-plus"></i> Ajouter un Drive
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Lien Drive</th>
                                <th>Durée</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($drives as $drive)
                                <tr>
                                    <td>{{ $drive->drive_link }}</td>
                                    <td>{{ $drive->duration }}</td>
                                    <td>
                                        <a href="{{ route('drives.edit', $drive->id) }}" class="btn btn-sm btn-info">
                                            <i class="typcn typcn-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-danger delete-drive" data-id="{{ $drive->id }}">
                                            <i class="typcn typcn-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Aucun drive trouvé</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $drives->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.delete-drive').click(function() {
            var driveId = $(this).data('id');
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
                        url: '/drives/' + driveId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(result) {
                            $('button[data-id="' + driveId + '"]').closest('tr').remove();
                            Swal.fire('Supprimé !', 'Le drive a été supprimé.', 'success');
                        },
                        error: function() {
                            Swal.fire('Erreur !', 'Une erreur est survenue.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
