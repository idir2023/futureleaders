@extends('admin.layouts.master')

@section('title', 'Modifier un Drive')

@section('content')

    <div class="card mt-4">
        <div class="card-header bg-warning text-white">
            <h4 class="m-0">Modifier un Drive</h4>
        </div>

        <form id="editDriveForm" action="{{ route('drives.update', $drive->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="drive_link">Lien Drive <span class="text-danger">*</span></label>
                        <input type="url" class="form-control" id="drive_link" name="drive_link"
                            value="{{ old('drive_link', $drive->drive_link) }}" required>
                        @error('drive_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="duration">Durée <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="duration" name="duration"
                            value="{{ old('duration', $drive->duration) }}" required>
                        @error('duration')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Optionally, add more fields as needed -->

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
    // Optionally add dynamic features like adding/removing additional fields for drive options
</script>
@endsection
