<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Directors extends Model
{
    /* Décrit le nom de la table que ma classe fait référence
     * @var string
     */
    protected $table = 'directors';

    public function getAllDirectors()
    {
        return DB::table('directors')->get();
    }

    public function movies()
    {
        return $this->belongsToMany('App\Http\Models\Movies');
    }


}


?>