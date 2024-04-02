<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('classID');
            $table->foreign('classID')->references('id')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('attack');
            $table->integer('defense');
            $table->integer('speed');
            $table->integer('hp')->default(100);
            $table->integer('lvl')->default(1);
            $table->integer('xp_count')->default(0);
            $table->unsignedBigInteger('userID');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('maxHP')->default(100);
            $table->integer('points')->default(0);
            $table->integer('money')->default(0);
            $table->unsignedBigInteger('weaponID');
            $table->foreign('weaponID')->references('id')->on('weapons')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('armorID');
            $table->foreign('armorID')->references('id')->on('armor')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('skill1_ID');
            $table->integer('skill2_ID');
            $table->integer('skill3_ID');



        });
    }

    public function down()
    {
        Schema::dropIfExists('players');
    }
};
