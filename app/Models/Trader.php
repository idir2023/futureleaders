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
}



// Create the migration for the traders table
// database/migrations/xxxx_xx_xx_create_traders_table.php
// To generate: php artisan make:migration create_traders_table

/* 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradersTable extends Migration
{
    public function up()
    {
        Schema::create('traders', function (Blueprint $table) {
            $table->id();
           
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('traders');
    }
}
*/