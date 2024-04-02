<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enemy extends Model
{
    use HasFactory;

    protected $table = 'enemys';

    protected $fillable = [
        'name',
        'attack_power',
        'defense_power',
        'speed',
        'pictureID'
    ];


    public function attack(){

    }

    public function deffend(){

    }

}
