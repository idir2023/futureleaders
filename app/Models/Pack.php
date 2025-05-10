<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    use HasFactory;

    // Table name (optionnel si le nom est "packs")
    protected $table = 'packs';

    // Colonnes autorisées à l'insertion ou mise à jour en masse
    protected $fillable = [
        'name',
        'image',
        'duration_months',
        'price',
        'old_price',
        'has_inscription_fees',
    ];
}
