<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomicilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domiciles', function (Blueprint $table) {
            $table->unsignedBigInteger("participant_id");
            $table->foreign("participant_id")->references("id")->on("participants")->onUpdate("cascade")->onDelete("cascade");
            $table->unsignedBigInteger("city_id");
            $table->foreign("city_id")->references("id")->on("cities")->onUpdate("cascade")->onDelete("cascade");
            $table->date("start_date");
            $table->date("end_date")->nullable();
            $table->timestamps();
            $table->primary(['participant_id', 'city_id', 'start_date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domiciles');
    }
}
