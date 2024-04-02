<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riddles extends Model
{
    protected $table = 'riddles';

    protected $fillable = [
        'mission_id',
        'question',
        'answer',
        'xp_earned',
    ];

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }
}


?>
