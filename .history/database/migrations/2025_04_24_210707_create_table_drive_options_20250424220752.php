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
        Schema::create('table_drive_options', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
    use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDriveOptions extends Migration
{
    public function up()
    {
        Schema::create('drive_options', function (Blueprint $table) {
            $table->id();  // ID auto-incrémenté
            $table->string('drive_link');  // Lien vers le drive
            $table->string('duration');  // Durée en texte (ex : "1 month", "2 months")
            $table->timestamps();  // Pour created_at et updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('drive_options');
    }
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_drive_options');
    }
};
