<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->nullable();
            $table->integer('attack')->nullable();
            $table->integer('defense')->nullable();
            $table->integer('speed')->nullable();
            $table->integer('pictureID')->nullable();



        });
    }

    public function down()
    {
        Schema::dropIfExists('classes');
    }
};
