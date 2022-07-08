<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('app_id')->unsigned()->nullable();
            $table->string('code');
            $table->string('name');
            $table->integer('weight');
            $table->enum('type', ['cost', 'benefit']);
            $table->timestamps();
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criterias');
    }
}
