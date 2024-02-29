<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armors extends Model
{
    use HasFactory;

    protected $table = 'armors';

    protected $fillable = ['name', 'value', 'price', 'rarity','classID'];
}
