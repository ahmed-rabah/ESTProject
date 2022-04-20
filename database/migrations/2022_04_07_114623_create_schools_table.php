<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\models\stagiaire;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();

            $table->string('nomEtablissement')->nullable(false);
            $table->string('typeDiplome')->nullable(false);
            $table->date('dateDebut')->nullable(false);
            $table->date('dateFin')->nullable(false);
            $table->string('filiere')->nullable(false); // GL SMIA .....
            $table->text('description');
            $table->string('status');  // technicien supérieure , ingenieure ......


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
        Schema::dropIfExists('schools');
    }
}
