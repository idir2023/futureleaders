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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();
            $table->string('code_promo')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('parrain_id')->nullable();
            $table->foreign('parrain_id')->references('id')->on('users')->onDelete('set null');
            $table->float('profit_user')->nullable(); // commission
            $table->string('rank')->nullable(); // commission
            $table->boolean('buy_month')->nullable();
            $table->rememberToken();
            $table->enum('role', ['admin', 'user', 'coach'])->default('user'); // Nouveau champ role
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
