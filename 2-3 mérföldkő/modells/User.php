<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'users';

    public function player()
    {
        return $this->hasOne(Player::class, 'userID');
    }

    protected $fillable =  [
        'username',
        'password'
    ];

    protected $hidden = [

        'password'
    ];


}
