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
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $coach->nom) }}" required>
                    @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="prenom">Prénom <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', $coach->prenom) }}" required>
                    @error('prenom') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $coach->email) }}" required>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="numero">Numéro de téléphone</label>
                    <input type="text" class="form-control" id="numero" name="numero" value="{{ old('numero', $coach->numero) }}">
                    @error('numero') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="code_promo">Code Promo</label>
                    <input type="text" class="form-control" id="code_promo" name="code_promo" value="{{ old('code_promo', $coach->code_promo) }}">
                    @error('code_promo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="rib">RIB <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="rib" name="rib" value="{{ old('rib', $coach->rib) }}" required>
                    @error('rib') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" id="ville" name="ville" value="{{ old('ville', $coach->ville) }}">
                    @error('ville') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="adresse">Adresse</label>
                    <textarea class="form-control" id="adresse" name="adresse" rows="2">{{ old('adresse', $coach->adresse) }}</textarea>
                    @error('adresse') <span class="text-danger">{{ $message }}</span> @enderror
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
