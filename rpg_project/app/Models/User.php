<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // A tábla neve, ha eltér a modell név, akkor meg kell adni
    protected $table = 'users';

    // A töltendő és mentendő mezők listája
    protected $fillable = ['username', 'password'];

    // A rejtendő mezők listája
    protected $hidden = ['password'];

    // A jelszó automatikus titkosítása
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
