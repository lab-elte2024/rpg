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
            $table->unsignedBigInteger('player_id')->nullable();
            $table->string('name', 255);
            $table->integer('type')->nullable();
            $table->timestamps();

            $table->foreign('player_id')->references('ID')->on('players')
                ->onDelete('CASCADE')
                ->onUpdate('NO ACTION');
        });
    }

    public function down()
    {
        Schema::table('missions', function (Blueprint $table) {
            $table->dropForeign(['player_id']);
        });

        Schema::dropIfExists('missions');
    }
};
