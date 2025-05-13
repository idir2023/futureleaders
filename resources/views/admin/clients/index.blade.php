@extends('admin.layouts.master')

@section('title', 'Gestion des Clients')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des Clients</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom Complete</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Code Promo</th>
                                    <th>Commission</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clients as $key => $client)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->telephone }}</td>
                                        <td>{{ $client->code_promo ? $client->code_promo : 'Aucun code promo' }}</td>
                                        <td
                                            class="{{ $client->profit_user >= 100 ? 'bg-success text-white' : 'bg-warning text-dark' }}">
                                            {{ intval($client->profit_user) }}
                                        </td>
                                        <td>
                                            @if ($client->code_promo)
                                                <span class="badge bg-success">Code déjà ajouté</span>
                                            @else
                                                <!-- Open the modal if no code_promo -->
                                                <a href="javascript:void(0);" class="btn btn-info btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#promoCodeModal{{ $client->id }}">
                                                    Ajouter un code promo
                                                </a>
                                            @endif
                                        </td>


                                        {{-- <td>
                                            <!-- Open the modal for the client -->
                                            <a href="javascript:void(0);" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#promoCodeModal{{ $client->id }}">
                                                Ajouter un code promo
                                            </a>
                                        </td> --}}
                                    </tr>

                                    <!-- Modal for each client -->
                                    <div class="modal fade" id="promoCodeModal{{ $client->id }}" tabindex="-1"
                                        aria-labelledby="promoCodeModalLabel{{ $client->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="promoCodeModalLabel{{ $client->id }}">
                                                        Ajouter un Code Promo</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('clients.add-code_promo', $client->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="promo_code" class="form-label">Entrez le code
                                                                promo</label>
                                                            <input type="text" class="form-control" id="promo_code"
                                                                name="promo_code" placeholder="Code promo" required>
                                                        </div>
                                                        <p>Êtes-vous sûr de vouloir ajouter ce code promo pour ce client ?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-info">Oui, ajouter</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Aucun client trouvé.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-4">
                        {{ $clients->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
