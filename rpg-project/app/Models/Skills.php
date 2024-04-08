<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


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

    public function getById($id){

        $skill = DB::table('skills')->where('id',$id)->get();
        return $skill;

    }
}
?>
