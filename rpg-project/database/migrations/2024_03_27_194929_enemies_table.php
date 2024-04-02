<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('enemies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('hp');
            $table->integer('attack_power');
            $table->integer('defense_power');
            $table->integer('speed');
            $table->integer('pictureID')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enemies');
    }
};
