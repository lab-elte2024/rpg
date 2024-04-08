<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Enemy extends Model
{
    use HasFactory;

    protected $table = 'enemies';

    protected $fillable = [
        'name',
        'attack_power',
        'defense_power',
        'speed',
        'pictureID'
    ];


    public function getById($id){
        $enemy = DB::table('enemies')->where('id',$id)->get();
        return $enemy;
    }

    public function attack($attack,$speed){
        $dmg = $attack+$speed;
    }

    public function deffend(){

    }

}
