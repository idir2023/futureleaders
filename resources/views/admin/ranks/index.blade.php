 {{-- resources/views/admin/ranks/index.blade.php --}}
 @extends('admin.layouts.master')

 @section('title', 'Gestion des ranks')

 @section('content')
     <div class="row">
         <div class="col-12">
             <div class="card">
                 <div class="card-header d-flex justify-content-between align-items-center">
                     <h4 class="card-title">Classement des Coachs par Nombre de Consultations</h4>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered table-striped">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Coach</th>
                                     <th>Email</th>
                                     <th>Nombre de Consultations</th>
                                     <th>Rank</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @forelse($coachs as $index => $coach)
                                     <tr>
                                         {{-- Calcul du rang: offset + position --}}
                                         <td>{{ $coachs->firstItem() + $index }}</td>
                                         <td>{{ $coach->nom }} {{ $coach->prenom }}</td>
                                         <td>{{ $coach->email }}</td>
                                         <td>{{ $coach->consultations_count }}</td>
                                         <td>
                                             @if ($index === 0)
                                                 🥇
                                             @elseif($index === 1)
                                                 🥈
                                             @elseif($index === 2)
                                                 🥉
                                             @else
                                                 {{ $index + 1 }}ᵉ
                                             @endif
                                         </td>

                                     </tr>
                                 @empty
                                     <tr>
                                         <td colspan="6" class="text-center">Aucun coach trouvé</td>
                                     </tr>
                                 @endforelse
                             </tbody>
                         </table>
                     </div>

                     {{-- Pagination --}}
                     <div class="mt-3">
                         {{ $coachs->links() }}
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection

 @section('scripts')
     <script>
         document.querySelectorAll('.delete-coach').forEach(btn => {
             btn.addEventListener('click', function() {
                 const id = this.dataset.id;
                 Swal.fire({
                     title: 'Confirmer la suppression ?',
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonText: 'Oui, supprimer',
                     cancelButtonText: 'Annuler',
                 }).then(result => {
                     if (result.isConfirmed) {
                         fetch(`/coaches/${id}`, {
                                 method: 'DELETE',
                                 headers: {
                                     'X-CSRF-TOKEN': document.querySelector(
                                         'meta[name="csrf-token"]').content,
                                     'Accept': 'application/json',
                                 }
                             })
                             .then(res => res.ok ? location.reload() : Promise.reject())
                             .catch(() => Swal.fire('Erreur', 'Impossible de supprimer.', 'error'));
                     }
                 });
             });
         });
     </script>
 @endsection
