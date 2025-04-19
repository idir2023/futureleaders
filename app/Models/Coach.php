<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'numero',
        'code_promo',
        'ville',
        'adresse',
        'date_naissance'
    ];
    public function bankAccounts()
{
    return $this->hasMany(BankAccount::class);
}
// app/Models/Coach.php

public function consultations()
{
    return $this->hasMany(Consultation::class);
}


}