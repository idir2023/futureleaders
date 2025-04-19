<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    // Define the table name if it differs from the plural form
    protected $table = 'bank_accounts';

    // Fillable attributes
    protected $fillable = [
        'coach_id', 
        'bank_name', 
        'rib'
    ];

    // Define the relationship with the Coach model
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
