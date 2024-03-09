<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{



   public function create(array $data)
   {
     return User::create([
       'username' => $data['username'],
       'password' => Hash::make($data['password'])
     ]);
   }

   public function is_valid($username){

    $getName = DB::table('users')->where('username',$username)->get();

    if ($getName->isEmpty()) {
        return $result = true;
    } else {
        return $result = false;
    }

   }

    public function register(Request $request): RedirectResponse{
        $data = $request->all();

        if($this->is_valid($data['username']) == true) {
            $check = $this->create($data);
            return redirect("menu")->withSuccess('Great! You have Successfully loggedin');
        }

        else {
            return redirect("registration");
        }

    }

    public function login(Request $request): RedirectResponse{
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('menu')
                        ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function logout():RedirectResponse{
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }


}
