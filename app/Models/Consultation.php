<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'adresse',
        'probleme',
        'recu',
        'paiement_status',
        'coach_id',
        'registered_by'
    ];

 

    // App\Models\Consultation.php
public function coach()
{
    return $this->belongsTo(Coach::class);
}

// Consultation.php
public function user()
{
    return $this->belongsTo(User::class);
}


}
