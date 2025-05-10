 <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePacksTable extends Migration
    {
        public function up()
        {
            Schema::create('packs', function (Blueprint $table) {
                $table->id();
                $table->string('name'); // ex: Silver, Gold
                $table->string('image')->nullable(); // chemin image ex: assets/images/ranks/silver-rank.png
                $table->unsignedInteger('duration_months'); // durée du pack en mois
                $table->decimal('price', 8, 2); // prix actuel (ex: 90.00)
                $table->decimal('old_price', 8, 2)->nullable(); // ancien prix (ex: 120.00)
                $table->boolean('has_inscription_fees')->default(false); // frais d'inscription ou non
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('packs');
        }
    }
