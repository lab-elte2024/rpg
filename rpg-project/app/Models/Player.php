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
        'current_mission',
        'isCounter',
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

        $player = DB::table('players')->where('userID', $id)->first();
        return $player;

    }




    public function useSkill($skill_ID){

        $skill = DB::table('skills')->where('id',$skill_ID)->get();

    }



}
