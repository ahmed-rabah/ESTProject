<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\models\category;
use App\models\domaine;


class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();

            $table->String('ICE')->nullable(false)->unique();
            $table->String('nom_entreprise')->nullable(false)->unique();
             $table->string('ville')->nullable(false);
            $table->string('email')->nullable(false)->unique();
            $table->string('adresse')->nullable(false)->unique();
            $table->string('telephone')->unique();
            $table->text('description')->nullable();
            $table->String('logo')->nullable();
            $table->boolean('actif')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->timestamps();

            $table->foreignIdFor(domaine::class);
            $table->foreignIdFor(category::class);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
}
