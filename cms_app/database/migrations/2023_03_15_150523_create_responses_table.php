<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("participant_id");
            $table->foreign("participant_id")->references("id")->on("participants")->onUpdate("cascade")->onDelete("cascade");
            $table->unsignedBigInteger("city_id");
            $table->foreign("city_id")->references("id")->on("cities")->onUpdate("cascade")->onDelete("cascade");
            $table->unsignedBigInteger("survey_id");
            $table->foreign("survey_id")->references("id")->on("surveys")->onUpdate("cascade")->onDelete("cascade");
            $table->integer('corruption_index');
            $table->timestamps();
            $table->unique(["participant_id", "city_id", "survey_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responses');
    }
}
