<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\models\entreprise;

class CreateFeedbackEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_entreprises', function (Blueprint $table) {
            $table->id();
            $table->text('feedback');
            $table->timestamps();

            $table->foreignIdFor(entreprise::class)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_entreprises');
    }
}
