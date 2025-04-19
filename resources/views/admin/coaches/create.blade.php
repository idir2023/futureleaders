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
                    @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="prenom">Prénom <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                    @error('prenom') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="numero">Numéro de téléphone</label>
                    <input type="text" class="form-control" id="numero" name="numero">
                    @error('numero') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="code_promo">Code Promo</label>
                    <input type="text" class="form-control" id="code_promo" name="code_promo">
                    @error('code_promo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="rib">RIB <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="rib" name="rib" required>
                    @error('rib') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" id="ville" name="ville">
                    @error('ville') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="adresse">Adresse</label>
                    <textarea class="form-control" id="adresse" name="adresse" rows="2"></textarea>
                    @error('adresse') <span class="text-danger">{{ $message }}</span> @enderror
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
