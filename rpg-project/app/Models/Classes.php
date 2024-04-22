<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'name',
        'attack',
        'defense',
        'speed',
        'pictureID'
    ];

    public function Weapon()
    {
        return $this->hasMany(Weapon::class);
    }

    public function getClassByID($id){

        $name = DB::table('classes')->where('ID',$id)->get();
        return $name;

    }

    public function getClasses(){

        $data = DB::table('classes')->get();
        return $data;

    }

    /*

    int is_counterAttack

    0 no
    1 yes




    */


}
