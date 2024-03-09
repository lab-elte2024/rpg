<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Armor extends Model
{
    use HasFactory;

    protected $table = 'armor';

    protected $fillable = [
        'name',
        'armor',
        'lvl',
        'pictureID',
        'classID'
    ];

    public function getArmorByClass($class_id){

        $name = DB::table('armor')->where('classID',$class_id)->where('lvl','1')->get();
        return $name;

    }


}
