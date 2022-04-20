<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\models\stagiaire;
class CreateFeedbackStagiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_stagiaires', function (Blueprint $table) {
            $table->id();
            $table->text('feedback');
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
        Schema::dropIfExists('feedback_stagiaires');
    }
}
