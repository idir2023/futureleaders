<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('traders', function (Blueprint $table) {
            $table->id();
             $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->datetime('birthdate')->nullable();
            $table->string('pack')->default('Non valide');
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->string('rank')->default('Unranked');
            $table->decimal('commission', 10, 2)->default(0);
            $table->decimal('revenue', 10, 2)->default(0);
            $table->decimal('broker_commission', 10, 2)->default(0);
            $table->decimal('academy_commission', 10, 2)->default(0);
            $table->decimal('total_commission', 10, 2)->default(0);
            $table->string('status')->default('Non valide');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traders');
    }
};
