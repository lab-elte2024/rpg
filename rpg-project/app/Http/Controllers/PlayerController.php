<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RedirectResponse;

class PlayerController extends Controller
{
    //

    public function create($data){

        $classData = DB::table('classes')->where('ID', $data['classID'])->first();




        return Player::create([
            'name' => $data['name'],
            'classID' => $data['classID'],
            'attack' => $classData->attack,
            'defense' => $classData->defense,
            'speed' => $classData->speed,
            'userID' => 1
          ]);
    }




    public function mk_player(Request $request) {
        $data = $request->all();
        $check = $this->create($data);

        return redirect("menu");
    }


}
