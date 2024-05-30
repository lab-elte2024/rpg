<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Weapon extends Model
{
    use HasFactory;

    protected $table = 'weapons';

    protected $fillable = ['name', 'min_attack', 'max_attack', 'lvl', 'pictureID', 'classID', 'price'];

    public function Classes()
    {
        return $this->belongsTo(Classes::class);
    }


    public function getWeaponByClass($class_id){

        //$weapon =  Weapon::where('classID',$class_id)->get()->first();
        $weapon = DB::table('weapons')->where('classID',$class_id)->where('lvl','1')->get();
        return $weapon;

    }

    public function getWeaponByID($id){
        $weapon = DB::table('weapons')->where('ID',$id)->get();
        return $weapon;
    }

    public function getNextWeapon($class_id,$lvl){
        $nextLvl = $lvl + 1;
        $weapon = Weapon::where('classID',$class_id)->where('lvl',$nextLvl)->get();
        if($weapon != null) return $weapon;

    }




    public function getDamage($min_damage,$max_damage){
        return rand($min_damage,$max_damage);
    }


    public function setMoney($id,$money){
        return($weapon = DB::table('players')
        ->where('ID',$id)
        ->update(['money' => $money]));
    }



    public function upgrade(Request $request){
        $data = $request->all();

        $id = $data['playerID'];
        $weaponID = $data['weaponID'];
        $price = $data['price'];
        $money = $data['money'];


        if($price <= $money){
            $weapon = DB::table('players')
            ->where('ID',$id)
            ->update([
                'weaponID' => $weaponID,
                'money' => $money - $price
            ]);



        }else{

        }
        return redirect('blacksmith');
    }


}


