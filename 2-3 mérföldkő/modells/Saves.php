<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saves extends Model
{
    protected $table = 'saves';

    protected $fillable = [
        'playerID',
        'currentQuestID',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class, 'playerID');
    }

    public function currentQuest()
    {
        return $this->belongsTo(Mission::class, 'currentQuestID');
    }
}

?>
