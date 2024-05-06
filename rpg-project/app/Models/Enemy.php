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
        'attack',
        'defense',
        'speed',
        'pictureID',
        'isCounter',
    ];


    public function getById($id){
        $enemy = DB::table('enemies')->where('ID',$id)->get();
        return $enemy;
    }

    public function attack($attack,$speed){
        $dmg = $attack+$speed;
    }

    public function deffend(){

    }

}
