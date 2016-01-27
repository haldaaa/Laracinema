<?php

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sessions extends Model
{
    protected $table = 'sessions';


    public function getAvgSession2()
    {
        //methode querybuilder :
        $results = DB::table('sessions')
            ->select(DB::raw('ROUND(AVG(HOUR(date_session))) AS date'))
            ->first();
        // first retourne le premeir érsutlat
        // get retourne un tableau de résultat

        return $results;

    }

    //certaine relation sont inutiles et fausses, trouver lesquels !

    public function movies()
    {
        return $this->belongsTo('App\Http\Models\Movies');
    }

    public function cinema()
    {
        return $this->belongsTo('App\Http\Models\Cinema');
    }

    //premiere methode :
    public function getNextSession()
    {
        /*  premiere methode :
        $result = DB::select('Select sessions.date_session , movies.title , cinema.title
                FROM sessions
                INNER JOIN movies ON sessions.movies_id=movies.id
                INNER JOIN cinema ON sessions.cinema_id = cinema.id
                WHERE date_session > NOW()
                LIMIT 15');
*/
        //take = limit en laravel

        //deuxieme methode (traduction php de ma requete sql ):

        $result = DB::table('sessions')
            ->select("sessions.date_session", "movies.title AS mtitle", "cinema.title AS mcinema")
            ->join("movies", "sessions.movies_id",'=', "movies.id")
            ->join("cinema", "sessions.cinema_id",'=', "cinema.id")
            ->where("date_session",  ">", DB::raw("NOW()"))
            ->orderBy('date_session', "ASC")
            ->take(15)
            ->get();


        return $result;


    }
}
