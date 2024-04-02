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
            $table->integer('classID')->default(0);
            $table->integer('attack');
            $table->integer('defense');
            $table->integer('speed');
            $table->integer('hp')->default(100);
            $table->integer('lvl')->default(1);
            $table->integer('xp_count')->default(0);
            $table->integer('userID')->nullable();
            $table->integer('maxHP')->default(100);
            $table->integer('points')->default(0);
            $table->integer('money')->default(0);
            $table->integer('weaponID');
            $table->integer('armorID');
            $table->integer('skill1_ID');
            $table->integer('skill2_ID');
            $table->integer('skill3_ID');
            $table->timestamps();

            $table->foreign('armorID')->references('ID')->on('armor')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('skill1_ID')->references('ID')->on('skills')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('skill2_ID')->references('ID')->on('skills')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('skill3_ID')->references('ID')->on('skills')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('weaponID')->references('ID')->on('weapons')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('userID')->references('ID')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    public function down()
    {
        Schema::dropIfExists('players');
    }
};
