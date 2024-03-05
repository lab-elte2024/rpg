<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerInventory extends Model
{
    use HasFactory;

    protected $table = 'playeritems';

    protected $fillable = [
            'playerID',
            'weaponID',
            'armorID',
            'skill1_ID',
            'skill2_ID',
            'skill3_ID'
    ];


}
