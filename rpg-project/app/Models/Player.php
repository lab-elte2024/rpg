<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    protected $fillable = [
        'name',
        'classID',
        'attack',
        'defense',
        'speed',
        'hp',
        //'hp_max',
        'lvl',
        'xp_count',
        'userID'
    ];



    public function attack($attack,$weapon_damage,$speed){

        $dmg = $attack + $weapon_damage + ($speed/2);

        return $dmg;

    }

    public function deffend(){

    }


}
