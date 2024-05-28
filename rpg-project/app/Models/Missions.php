<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Missions extends Model
{
    protected $table = 'missions';

    protected $fillable = [
        'pre_id',
        'description',
        'name',
        'missionID',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}

class CombatMission extends Missions
{
    protected $fillable = [
        'pre_id',
        'name',
        'description',
        'enemy_id',
    ];



}



class ProblemSolutionMission extends Missions
    {
        protected $fillable = [
            'pre_id',
            'name',
            'description',
            'answer',
            'reward',
        ];
    }





?>
