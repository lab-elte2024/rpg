<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('armor', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256)->nullable();
            $table->integer('armor')->nullable();
            $table->integer('lvl')->nullable();
            $table->integer('pictureID')->nullable();
            $table->integer('classID')->nullable();
            $table->integer('price')->nullable();
        });

        $table->foreign('classID')->references('id')->on('classes')
        ->onDelete('NO ACTION')
        ->onUpdate('NO ACTION');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armor');
    }
};
