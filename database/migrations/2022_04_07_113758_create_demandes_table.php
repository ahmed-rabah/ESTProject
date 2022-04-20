<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\models\stagiaire;
use App\models\type;
use App\models\domaine;


class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();

            $table->date('dateDebut')->nullable(false);
            $table->date('dateFin')->nullable(false);
            $table->string('ville');
            $table->boolean('renumeration');
            $table->text('description')->nullable();

              $table->timestamps();

              $table->foreignIdFor(stagiaire::class)->onDelete('cascade');
            $table->foreignIdFor(type::class);
            $table->foreignIdFor(domaine::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandes');
    }
}
