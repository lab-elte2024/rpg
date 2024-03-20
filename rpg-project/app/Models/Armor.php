<?php

namespace App\Models;

use Illuminate\Http\Request;
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
        'classID',
        'price'
    ];

    public function getArmorByClass($class_id){

        $name = DB::table('armor')
        ->where('classID',$class_id)
        ->where('lvl','1')
        ->get();
        return $name;

    }

    public function getArmorByID($id){
        $weapon = DB::table('armor')
        ->where('ID',$id)
        ->get();
        return $weapon;
    }

    public function getNextArmor($class_id,$lvl){
        $weapon = DB::table('armor')
        ->where('lvl',$lvl+1)
        ->where('classID',$class_id)
        ->get();
        return $weapon;
    }

    public function getDamage($min_damage,$max_damage){
        return rand($min_damage,$max_damage);
    }

    public function upgrade(Request $request){
        $data = $request->all();

        $id = $data['playerID'];
        $armorID = $data['armorID'];
        $price = $data['price'];
        $money = $data['money'];

        if($price <= $money){
        $armor = DB::table('players')
        ->where('ID',$id)
        ->update(['armorID' => $armorID]);
        }
        return redirect('blacksmith');
    }
}
