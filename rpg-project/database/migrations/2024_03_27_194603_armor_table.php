<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('armor', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('armor')->nullable();
            $table->integer('lvl')->nullable();
            $table->integer('pictureID')->nullable();
            $table->unsignedBigInteger('classID');
            $table->foreign('classID')->references('id')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('price')->nullable();



        });
    }

    public function down()
    {
        Schema::dropIfExists('armor');
    }
};
