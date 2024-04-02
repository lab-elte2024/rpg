<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Missions extends Model
{
    protected $table = 'missions';

    protected $fillable = [
        'player_id',
        'name',
        'type',
    ];




    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}

    class CombatMission extends Mission
    {
        protected $fillable = [
            'player_id',
            'name',
            'type',
            'enemy_id',
        ];
    }

    class ProblemSolutionMission extends Mission
    {
        protected $fillable = [
            'player_id',
            'name',
            'type',
            'problem',
            'solution',
            'reward',
        ];
    }

?>
