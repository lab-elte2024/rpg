<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{

    use HasFactory;

    protected $table = 'users';

    protected $filable =  [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];


}
