<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperherosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superheros', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('full_name');
            $table->integer('strength');
            $table->integer('speed');
            $table->integer('durability');
            $table->integer('power');
            $table->integer('combat');
            $table->string('height');
            $table->string('weight');
            $table->string('eye_color');
            $table->string('hair_color');

            $table->unsignedBigInteger('race_id')->nullable();
            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade');
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');

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
        Schema::dropIfExists('superheros');
    }
}
