<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armor extends Model
{
    use HasFactory;

    protected $table = 'armors';

    protected $fillable = [
        'name',
        'armor',
        'lvl',
        'pictureID',
        'classID'
    ];


}
