<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    //

    public function create($data){
        return Player::create([
            'name' => $data['name'],
            'classID' => $data['classID'],
            'attack' => $data['attack'],
            'defense' => $data['defense'],
            'speed' => $data['speed'],
            'hp' => $data['hp'],
            'lvl' => $data['lvl'],
            'xp_count' => $data['xp_count'],
            'userID' => $data['userID']
          ]);
    }

    public function dasd(){
        return "";
    }

    public function mk_player(Request $request): RedirectResponse{
        $data = $request->all();
        $check = $this->create($data);

        return redirect("menu")->withSuccess('Great! You have Successfully loggedin');
        //
    }

}
