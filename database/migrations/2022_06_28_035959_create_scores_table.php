<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('alternative_id')->unsigned()->nullable();
            $table->bigInteger('criteria_id')->unsigned()->nullable();
            $table->string('score')->nullable();
            $table->timestamps();
            $table->foreign('alternative_id')->references('id')->on('alternatives')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
