

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    use HasFactory;

    // Définir le nom de la table explicitement (si nécessaire)
    protected $table = 'drive';

    // Les champs qui peuvent être assignés en masse
    protected $fillable = ['drive_link', 'duration'];

    // Si tu utilises des dates personnalisées, tu peux les ajouter ici
    // protected $dates = ['created_at', 'updated_at'];
}
