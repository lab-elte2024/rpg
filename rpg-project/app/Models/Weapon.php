<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Weapon extends Model
{
    use HasFactory;

    protected $table = 'weapons';

    protected $fillable = ['classID', 'name', 'min_damage', 'max_damage', 'rarity', 'price', 'is_purchasable', 'pictureID'];

    public function getWeaponByClass($class_id){

        $name = DB::table('weapons')->where('classID',$class_id)->where('lvl','1')->get();
        return $name;

    }


    public function getDamage($min_damage,$max_damage){
        return rand($min_damage,$max_damage);
    }

    public function handleRarity($rarity)
    {
        if ($rarity == 1) {
            return 'Common';
        } elseif ($rarity == 2) {
            return 'Rare';
        } elseif ($rarity == 3) {
            return 'Epic';
        } else {
            return 'Unknown';
        }
    }
}


