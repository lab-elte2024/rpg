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
        'skill3_ID',
        'current_mission'
    ];


    public function armor()
    {
        return $this->belongsTo(Armor::class, 'armorID');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class, ['skill1_ID', 'skill2_ID', 'skill3_ID']);
    }

    public function weapon()
    {
        return $this->belongsTo(Weapon::class, 'weaponID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function getByUserID($id){

        $pID = DB::table('players')->where('userID',$id)->get();
        return $pID;

    }


    public function updateStat(){

    }

    public function useSkill($skill_ID){

        $skill = DB::table('skills')->where('id',$skill_ID)->get();

        //$dmg = $attack + $weapon_damage + ($speed/2);

        //return $dmg;

    }

    public function deffend(){

    }


}
