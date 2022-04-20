<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\models\stagiaire;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();

            $table->string('nomExperience')->nullable(false); //nom enreprise ou place de cette experience
            $table->date('dateDebut')->nullable(false);
            $table->date('dateFin')->nullable(false);
            $table->string('post'); //developpeur , concepteur , comptable ...
            $table->string('type')->nullable(false); // stage  emploi 
            $table->text('description');

            $table->timestamps();
        
            $table->foreignIdFor(stagiaire::class)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
