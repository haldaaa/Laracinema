<?php

namespace App\Http\Models;
/*
 * Classe qui va stocker mes requêtes autour de la table movies
 */
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Categories;

class Movies extends Model
{
    /* Décrit le nom de la table que ma classe fait référence
     * @var string
     */
    protected $table = 'movies';


    public function getAllMovies()
    {
        return DB::table('movies')->get();
    }


    public function categories()
    {
        return $this->belongsTo('App\Http\Models\Categories');
    }

    public function actors()
    {
        return $this->belongsToMany('App\Http\Models\Actors');
    }

    public function getAvgNoteMovies()
    {
        $results = DB::table('movies')
            ->select(DB::raw('ROUND(AVG(note_presse)) AS note'))
            ->first();

        return $results;
    }

    public function sessions()
    {
        return $this->belongsToMany('App\Http\Models\Sessions');
    }


    public function countDistributeur()
    {
        $result = DB::table('movies')
            ->select(DB::raw("COUNT(id) as nb"),'distributeur as distrib')
            ->groupBy('distributeur')
            ->get();

        return $result;
    }
}



?>