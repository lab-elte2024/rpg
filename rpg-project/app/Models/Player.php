<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Player extends Model
{
    public $timestamps = false;
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
        'lvl',
        'xp_count',
        'userID',
        'maxHP',
        'points',
        'money',
        'weaponID',
        'armorID',
        'skill1_ID',
        'skill2_ID',
        'skill3_ID'
    ];

    public function getByUserID($id){

        $pID = DB::table('players')->where('userID',$id)->get();
        return $pID;

    }

    public function attack($attack,$weapon_damage,$speed){

        $dmg = $attack + $weapon_damage + ($speed/2);

        return $dmg;

    }

    public function deffend(){

    }


}
