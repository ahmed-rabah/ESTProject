<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\models\offre;
use App\models\stagiaire;
class CreateEntretienOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entretien_offres', function (Blueprint $table) {
            $table->id();
            $table->boolean('accepter');
            $table->timestamps();
            
            $table->foreignIdFor(offre::class);
            $table->foreignIdFor(stagiaire::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entretien_offres');
    }
}
