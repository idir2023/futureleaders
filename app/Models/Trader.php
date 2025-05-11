<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'address',
        'birthdate',
        'pack',
        'start_date',
        'end_date',
        'rank',
        'commission',
        'revenue',
        'broker_commission',
        'academy_commission',
        'total_commission',
        'status',
        'user_id'
    ];

    protected $casts = [
        'birthdate' => 'datetime',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function getStatusColorClass()
    {
        return $this->status == 'Non valide' ? 'text-danger' : 'text-success';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
