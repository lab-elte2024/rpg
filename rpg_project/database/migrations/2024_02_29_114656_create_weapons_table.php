<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->id();
            $table->int('classID');
            $tabel->string('name');
            $tabel->int('min_damage');
            $tabel->int('max_damage');
            $tabel->int('rarity');
            $tabel->int('price');
            $tabel->int('is_purchasable');
            $tabel->int('pictureID');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('weapons');
    }
};
