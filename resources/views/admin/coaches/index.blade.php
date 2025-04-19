@extends('admin.layouts.master')

@section('title', 'Gestion des Coachs')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des Coachs</h4>
                <a href={{ route('coaches.create') }} class="btn btn-warning float-right">
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
                                <th>RIB</th>
                                <th>Ville</th>
                                <th>Adresse</th>
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
                                <td>{{ $coach->rib }}</td>
                                <td>{{ $coach->ville }}</td>
                                <td>{{ $coach->adresse }}</td>
                                <td>
                                    <a href="{{route('coaches.edit' , $coach->id)}}" class="btn btn-sm btn-info edit-coach" >
                                        <i class="typcn typcn-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger delete-coach" data-id="{{ $coach->id }}">
                                        <i class="typcn typcn-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">Aucun coach trouvé</td>
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

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
  
        // Delete button with SweetAlert
        $('.delete-coach').click(function() {
            var coachId = $(this).data('id');
            
            Swal.fire({
                title: 'Êtes-vous sûr?',
                text: "Vous ne pourrez pas annuler cette action!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/coaches/' + coachId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(result) {
                            $('button[data-id="' + coachId + '"]').closest('tr').remove();
                            Swal.fire('Supprimé!', 'Le coach a été supprimé.', 'success');
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
