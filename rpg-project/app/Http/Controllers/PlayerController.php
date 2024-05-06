<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Skills;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RedirectResponse;

class PlayerController extends Controller
{
    //

    public function create($data){

        $classData = DB::table('classes')->where('ID', $data['classID'])->first();

        $cID = $data['classID'];

        $skills = new Skills();
        $sk = $skills->getByClassID($cID*1);
        $skillsT = [];

        foreach ($sk as $s) {
            $skillsT[] = $s->ID;
        }



        return Player::create([
            'name' => $data['name'],
            'classID' => $data['classID'],
            'attack' => $classData->attack,
            'defense' => $classData->defense,
            'speed' => $classData->speed,
            'weaponID' => $data['weaponID'],
            'armorID' => $data['armorID'],
            'userID' => $data['userID'],
            'skill1_ID' => $skillsT[0],
            'skill2_ID' => $skillsT[1],
            'skill3_ID' => $skillsT[2],
          ]);
    }





    public function mk_player(Request $request) {
        $data = $request->all();
        $check = $this->create($data);

        return redirect("login");
    }


    public function update_stat(){



        return redirect("stat");
    }


}
