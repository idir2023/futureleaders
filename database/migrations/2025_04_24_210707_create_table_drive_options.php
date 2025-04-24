<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   

    public function up()
    {
        Schema::create('drive', function (Blueprint $table) {
            $table->id();  
            $table->string('drive_link'); 
            $table->string('duration'); 
            $table->timestamps();  
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('table_drive');
    }
};
