<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('riddles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mission_id')->nullable();
            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');
            $table->text('question');
            $table->text('answer');
            $table->integer('xp_earned');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('riddles');
    }
};
