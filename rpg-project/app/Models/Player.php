<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

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



}
