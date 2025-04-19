@extends('admin.layouts.master')

@section('title', 'Ajouter un Coach')

@section('content')

    <div class="card mt-4">
        <div class="card-header bg-warning text-white">
            <h4 class="m-0">Ajouter un Coach</h4>
        </div>

        <form id="addCoachForm" action="{{ route('coaches.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="nom">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="prenom">Prénom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                        @error('prenom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="numero">Numéro de téléphone</label>
                        <input type="text" class="form-control" id="numero" name="numero">
                        @error('numero')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="code_promo">Code Promo</label>
                        <input type="text" class="form-control" id="code_promo" name="code_promo">
                        @error('code_promo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="date_naissance">Date de naissance</label>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance">
                        @error('date_naissance')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Add dynamic bank accounts -->
                <!-- Compte Bancaire -->
                <div class="card border rounded shadow-sm mt-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Comptes Bancaires</h5>
                    </div>

                    <div class="card-body">
                        <div id="bankAccountsContainer">
                            <div class="bankAccountRow row mb-2">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="bank_accounts[0][bank_name]"
                                        placeholder="Nom de la banque" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="bank_accounts[0][rib]"
                                        placeholder="RIB" required>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" id="addBankAccount" class="btn btn-outline-success btn-sm">+ Ajouter un
                                compte bancaire</button>
                            <button type="button" id="removeBankAccount" class="btn btn-outline-danger btn-sm">- Supprimer
                                le dernier</button>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville">
                        @error('ville')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="adresse">Adresse</label>
                        <textarea class="form-control" id="adresse" name="adresse" rows="2"></textarea>
                        @error('adresse')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-warning">Enregistrer</button>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
<script>
    document.getElementById('addBankAccount').addEventListener('click', function() {
        let container = document.getElementById('bankAccountsContainer');
        let index = container.getElementsByClassName('bankAccountRow').length;

        let row = document.createElement('div');
        row.classList.add('bankAccountRow', 'row', 'mb-2');
        row.innerHTML = `
            <div class="col-md-6">
                <input type="text" class="form-control" name="bank_accounts[${index}][bank_name]" placeholder="Nom de la banque" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="bank_accounts[${index}][rib]" placeholder="RIB" required>
            </div>
        `;
        container.appendChild(row);
    });

    document.getElementById('removeBankAccount').addEventListener('click', function() {
        let container = document.getElementById('bankAccountsContainer');
        let rows = container.getElementsByClassName('bankAccountRow');
        if (rows.length > 1) {
            container.removeChild(rows[rows.length - 1]);
        }
    });
</script>
@endsection

