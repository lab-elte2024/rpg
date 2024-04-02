<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->integer('preID')->nullable();
            $table->string('name', 256);
            $table->string('type', 256);
            $table->integer('enemyID')->nullable();
            $table->text('problem')->nullable();
            $table->text('solution')->nullable();
            $table->text('reward')->nullable();
        });
    }


    public function down()
    {
        Schema::dropIfExists('missions');
    }
};
