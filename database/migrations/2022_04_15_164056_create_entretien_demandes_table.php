<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\models\entreprise;
use App\models\demande;
class CreateEntretienDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entretien_demandes', function (Blueprint $table) {
            $table->id();
            $table->boolean('accepter');
            $table->timestamps();
            
            $table->foreignIdFor(demande::class);
            $table->foreignIdFor(entreprise::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entretien_demandes');
    }
}
