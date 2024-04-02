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
        Schema::create('weapons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256)->nullable();
            $table->integer('min_attack')->nullable();
            $table->integer('max_attack')->nullable();
            $table->integer('lvl')->nullable();
            $table->integer('pictureID')->nullable();
            $table->unsignedBigInteger('classID');
            $table->foreign('classID')->references('id')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('price')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weapons');
    }
};
