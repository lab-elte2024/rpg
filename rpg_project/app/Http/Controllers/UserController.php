<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {


        $users = DB::table('users')->select('username')->where('username','=','valaki')->get();

        return view('users', compact('users'));
    }
}
