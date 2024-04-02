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
            $table->int('pre_id')->nullable();
            $table->string('name', 256);
            $table->string('type', 256);
            $table->int('enemy_id')->nullable();
            $table->text('problem')->nullable();
            $table->text('solution')->nullable();
            $table->text('reward')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('missions');
    }
};
