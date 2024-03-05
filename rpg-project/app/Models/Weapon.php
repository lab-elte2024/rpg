<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;

    protected $table = 'weapons';

    protected $fillable = ['classID', 'name', 'min_damage', 'max_damage', 'rarity', 'price', 'is_purchasable', 'pictureID'];


    public function handleRarity($rarity)
    {
        if ($rarity == 1) {
            return 'Common';
        } elseif ($rarity == 2) {
            return 'Rare';
        } elseif ($rarity == 3) {
            return 'Epic';
        } else {
            return 'Unknown';
        }
    }
}


