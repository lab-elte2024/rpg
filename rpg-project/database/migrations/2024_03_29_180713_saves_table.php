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
            $table->unsignedBigInteger('playerID')->nullable();
            $table->unsignedBigInteger('currentQuestID')->nullable();
            $table->timestamps();

            $table->foreign('playerID')->references('ID')->on('players')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');

            $table->foreign('currentQuestID')->references('ID')->on('missions')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
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
