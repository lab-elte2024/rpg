<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $table = 'skills';

    protected $fillable = [
        'name',
        'damage',
        'cooldown',
        'pictureID',
        'level_req',
        'is_healing',
    ];
}

?>
