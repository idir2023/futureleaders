@extends('admin.layouts.master')

@section('title', 'Gestion des Traders')

@section('content')
    <style>
        .stats-icon {
            opacity: 0.7;
        }

        .table thead th {
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .orange-text {
            color: orange;
        }

        .orange-bg {
            background-color: orange;
            color: white;
            /* Optional: Change text color to white for better readability */
        }
    </style>

    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-warning text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Gestion des Traders</h3>
                        <div>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal">
                                <i class="typcn typcn-download-outline"></i> Importer
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        {{-- <div class="row mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Total Revenue</h5>
                                <h3 class="card-text">{{ number_format($stats['total_revenue'], 2) }} dh</h3>
                            </div>
                            <div class="stats-icon">
                                <i class="fas fa-money-bill-wave fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Broker Commission</h5>
                                <h3 class="card-text">{{ number_format($stats['broker_commission'], 2) }} dh</h3>
                            </div>
                            <div class="stats-icon">
                                <i class="fas fa-percentage fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Academy Commission</h5>
                                <h3 class="card-text">{{ number_format($stats['academy_commission'], 2) }} dh</h3>
                            </div>
                            <div class="stats-icon">
                                <i class="fas fa-university fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Total Commission</h5>
                                <h3 class="card-text">{{ number_format($stats['total_commission'], 2) }} dh</h3>
                            </div>
                            <div class="stats-icon">
                                <i class="fas fa-chart-line fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Traders Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        <h4 class="mb-0">Liste des Traders</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="traders-table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Adresse</th>
                                        <th>Naissance</th>
                                        <th>Pack</th>
                                        <th>Date début</th>
                                        <th>Date fin</th>
                                        <th>Rank</th>
                                        <th>Commission</th>
                                        <th>Revenue</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($traders as $trader)
                                        <tr>
                                            <td>{{ $trader->name }}</td>
                                            <td>{{ $trader->phone_number }}</td>
                                            <td>{{ $trader->email }}</td>
                                            <td>{{ $trader->address }}</td>
                                            <td>{{ $trader->birthdate ? $trader->birthdate->format('d/m/Y') : '' }}</td>
                                            <td class="{{ $trader->getStatusColorClass() }}">{{ $trader->pack }}</td>
                                            <td>{{ $trader->start_date ? $trader->start_date->format('d/m/Y') : '' }}</td>
                                            <td>{{ $trader->end_date ? $trader->end_date->format('d/m/Y') : '' }}</td>
                                            <td>{{ $trader->rank }}</td>
                                            <td class="orange-text">{{ number_format($trader->commission, 2) }}</td>
                                            <!-- Applying orange-text here -->
                                            <td>{{ number_format($trader->revenue, 2) }}</td>
                                            <td>
                                                <div class="btn-group" role="group">

                                                    <button type="button" class="btn btn-sm btn-warning edit-trader"
                                                        data-id="{{ $trader->id }}">
                                                        <i class="typcn typcn-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-danger delete-trader"
                                                        data-id="{{ $trader->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#confirmDeleteModal">
                                                        <i class="typcn typcn-trash"></i>
                                                    </button>
                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center">Aucun trader trouvé</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $traders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Import Modal -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="importModalLabel">Importer des Traders</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{ route('traders.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="file" class="form-label">Fichier Excel (xlsx, xls, csv)</label>
                            <input type="file" class="form-control" id="file" name="file"
                                accept=".xlsx,.xls,.csv" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-warning">Importer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Confirmation Delete Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmer la suppression</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer ce trader ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        let deleteTraderId = null;

        // When delete button is clicked
        $('.delete-trader').on('click', function() {
            deleteTraderId = $(this).data('id'); // Get the trader ID
        });

        // Confirm the deletion
        $('#confirmDeleteButton').on('click', function() {
            if (deleteTraderId !== null) {
                // Send the delete request using AJAX
                $.ajax({
                    url: '/traders/' + deleteTraderId,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the trader row from the table
                            $('button[data-id="' + deleteTraderId + '"]').closest('tr').remove();
                            $('#confirmDeleteModal').modal('hide');
                            alert('Trader supprimé avec succès!');
                        } else {
                            alert('Erreur lors de la suppression');
                        }
                    },
                    error: function() {
                        alert('Erreur lors de la suppression');
                    }
                });
            }
        });
    </script>

@endsection
