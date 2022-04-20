<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();

            $table->String('nom_stagiaire')->nullable(false);
            $table->String('prenom_stagiaire')->nullable(false);
            $table->date('dateNaissance')->nullable(false);
            $table->string('CIN')->nullable(false)->unique();
            $table->string('email')->nullable(false)->unique();
            $table->string('telephone')->unique();
            $table->text('description')->nullable();
            $table->String('diplome')->nullable();
            $table->String('CV')->nullable();
            $table->String('photo')->nullable();
            $table->enum('gendre',['masculin','feminin'])->nullable(false);
            $table->boolean('actif')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stagiaires');
    }
}
