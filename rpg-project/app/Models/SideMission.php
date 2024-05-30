<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SideMission extends Model
{
    use HasFactory;


    protected $table = 'sidemissions';
    public $timestamps = false;


    protected $fillable = [
        'name',
        'type',
        'enemy_id',
        'description',
        'solution',
        'reward'
    ];
}
