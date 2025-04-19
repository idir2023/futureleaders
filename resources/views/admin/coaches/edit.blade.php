@extends('admin.layouts.master')

@section('title', 'Modifier un Coach')

@section('content')

    <div class="card mt-4">
        <div class="card-header bg-warning text-white">
            <h4 class="m-0">Modifier un Coach</h4>
        </div>
        <form id="editCoachForm" action="{{ route('coaches.update', $coach->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="nom">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nom" name="nom"
                            value="{{ old('nom', $coach->nom) }}" required>
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="prenom">Prénom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="prenom" name="prenom"
                            value="{{ old('prenom', $coach->prenom) }}" required>
                        @error('prenom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $coach->email) }}" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="numero">Numéro de téléphone</label>
                        <input type="text" class="form-control" id="numero" name="numero"
                            value="{{ old('numero', $coach->numero) }}">
                        @error('numero')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="code_promo">Code Promo</label>
                        <input type="text" class="form-control" id="code_promo" name="code_promo"
                            value="{{ old('code_promo', $coach->code_promo) }}">
                        @error('code_promo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="date_naissance">Date de naissance</label>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance"
                            value="{{ old('date_naissance', $coach->date_naissance) }}">
                        @error('date_naissance')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Compte Bancaire -->
                <div class="card border rounded shadow-sm mt-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Comptes Bancaires</h5>
                    </div>
                
                    <div class="card-body">
                        <div id="bankAccountsContainer">
                            @if(old('bank_accounts'))
                                @foreach(old('bank_accounts') as $index => $account)
                                    <div class="bankAccountRow row mb-2">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="bank_accounts[{{ $index }}][bank_name]"
                                                placeholder="Nom de la banque"
                                                value="{{ $account['bank_name'] ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="bank_accounts[{{ $index }}][rib]"
                                                placeholder="RIB"
                                                value="{{ $account['rib'] ?? '' }}">
                                        </div>
                                    </div>
                                @endforeach
                            @elseif($coach->bankAccounts && $coach->bankAccounts->count())
                                @foreach($coach->bankAccounts as $index => $account)
                                    <div class="bankAccountRow row mb-2">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="bank_accounts[{{ $index }}][bank_name]"
                                                placeholder="Nom de la banque"
                                                value="{{ $account->bank_name }}">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="bank_accounts[{{ $index }}][rib]"
                                                placeholder="RIB"
                                                value="{{ $account->rib }}">
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="bankAccountRow row mb-2">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="bank_accounts[0][bank_name]"
                                            placeholder="Nom de la banque">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="bank_accounts[0][rib]"
                                            placeholder="RIB">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="mt-3">
                            <button type="button" id="addBankAccount" class="btn btn-outline-success btn-sm">+ Ajouter un compte bancaire</button>
                            <button type="button" id="removeBankAccount" class="btn btn-outline-danger btn-sm">- Supprimer le dernier</button>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville"
                            value="{{ old('ville', $coach->ville) }}">
                        @error('ville')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="adresse">Adresse</label>
                        <textarea class="form-control" id="adresse" name="adresse" rows="2">{{ old('adresse', $coach->adresse) }}</textarea>
                        @error('adresse')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="button" class="btn btn-secondary" onclick="history.back()">Annuler</button>
                <button type="submit" class="btn btn-warning">Enregistrer</button>
            </div>
        </form>
    </div>

@endsection
@section('scripts')
<script>
    document.getElementById('addBankAccount').addEventListener('click', function () {
        let container = document.getElementById('bankAccountsContainer');
        let index = container.getElementsByClassName('bankAccountRow').length;

        let row = document.createElement('div');
        row.classList.add('bankAccountRow', 'row', 'mb-2');
        row.innerHTML = `
            <div class="col-md-6">
                <input type="text" class="form-control" name="bank_accounts[${index}][bank_name]" placeholder="Nom de la banque">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="bank_accounts[${index}][rib]" placeholder="RIB">
            </div>
        `;
        container.appendChild(row);
    });

    document.getElementById('removeBankAccount').addEventListener('click', function () {
        let container = document.getElementById('bankAccountsContainer');
        let rows = container.getElementsByClassName('bankAccountRow');
        if (rows.length > 1) {
            container.removeChild(rows[rows.length - 1]);
        }
    });
</script>
@endsection

