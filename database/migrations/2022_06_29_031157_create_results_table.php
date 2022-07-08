<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('app_id')->unsigned()->nullable();
            $table->bigInteger('alternative_id')->unsigned()->nullable();
            $table->string('result');
            $table->timestamps();
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('alternative_id')->references('id')->on('alternatives')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
