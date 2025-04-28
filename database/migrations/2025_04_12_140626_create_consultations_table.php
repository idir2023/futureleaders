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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();
            $table->text('probleme')->nullable();
            $table->string('recu')->nullable();
            $table->string('prix');
            $table->enum('paiement_status', ['en attente', 'payé'])->default('en attente');
            $table->string('drive_link')->nullable();
            $table->unsignedBigInteger('registered_by')->nullable(); // ✅ Correction ici
            $table->foreignId('coach_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            // Ajouter la clé étrangère pour registered_by
            $table->foreign('registered_by')->references('id')->on('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
