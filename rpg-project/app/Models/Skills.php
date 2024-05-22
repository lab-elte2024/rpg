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
        'is_healing',
    ];

    public function getByClassID($id){

        $skill = DB::table('skills')->where('classID',$id)->get();
        return $skill;

    }

    public function getById($id){

        $skill = DB::table('skills')->where('ID',$id)->get();
        return $skill;

    }
}
?>
