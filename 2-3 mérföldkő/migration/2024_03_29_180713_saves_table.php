<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('saves', function (Blueprint $table) {
            $table->id();
            $table->integer('playerID')->nullable();
            $table->integer('currentQuestID')->nullable();



        });
    }

    public function down()
    {
        Schema::table('saves', function (Blueprint $table) {
            $table->dropForeign(['playerID']);
            $table->dropForeign(['currentQuestID']);
        });

        Schema::dropIfExists('saves');
    }
};
