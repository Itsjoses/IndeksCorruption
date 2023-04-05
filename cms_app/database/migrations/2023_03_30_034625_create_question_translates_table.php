<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_translates', function (Blueprint $table) {
            $table->unsignedBigInteger("id");
            $table->foreign("id")->references("id")->on("questions")->onUpdate("cascade")->onDelete("cascade");
            $table->string("name");
            $table->string("leftmost_parameter")->default("Highly Disagree");
            $table->string("rightmost_parameter")->default("Highly Agree");
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
        Schema::dropIfExists('question_translates');
    }
}
