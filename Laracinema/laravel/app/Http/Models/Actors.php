<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Actors extends Model
{
    /* Décrit le nom de la table que ma classe fait référence
     * @var string
     */
    protected $table = 'actors';

    public function getAllActors()
    {
        return DB::table('actors')->get();
    }

    public function movies()
    {
        return $this->belongsToMany('App\Http\Models\Movies');
    }

    public function getAvgActors()
    {
        //$results = DB::select('SELECT ROUND( AVG ( TIMESTAMPDIFF( YEAR, dob, NOW( ) ) ) ) AS age
        //FROM  `actors`');
        //first= limit 1
        // DB raw permet dutiliser les fonction sql (round)

        $results = DB::table('actors')
        ->select(DB::raw('ROUND( AVG ( TIMESTAMPDIFF( YEAR, dob, NOW( ) ) ) ) AS age'))
        ->first();

        return $results;
    }


    public function getVilleByActors()
    {
        $result = DB::table('actors')
            ->select(DB::raw('COUNT(id) as nombre'),'city as ville' )
            ->groupBy('city')
            ->get();

        return $result;
    }


}


?>