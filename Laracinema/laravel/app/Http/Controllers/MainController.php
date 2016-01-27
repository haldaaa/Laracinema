<?php
namespace App\Http\Controllers;
use App\Http\Models\Actors;
use App\Http\Models\Categories;
use App\Http\Models\Commentaire;
use App\Http\Models\Directors;
use App\Http\Models\Movies;
use App\Http\Models\Sessions;
use App\Http\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class MainController
 * @package app\Http\Controllers
 * Suffixé par le mot clef Controller
 * et doit hérité de la super classe Controller
 */
class MainController extends Controller
{
    public function index()
    {
        return view('Main/index');
    }

    public function dashboard()
    {
        // METHODE ORM
        $nbacteurs = Actors::count();
        $nbcommentaire = Commentaire::count();

        $avgcommentaire = Commentaire::avg('note');

        $countnotepresse = Movies::count('note_presse');
        $avgnotepresse= Movies::avg('note_presse');

        $moviescount = Movies::count('id');
        $avgmovies = Movies::avg('duree');

        $actor = new Actors();

        //methode query builder
        $avgacteur = $actor->getAvgActors();

        $notepresse2 = new Movies();
        $countnotepresse2 = $notepresse2->getAvgNoteMovies();

        $avgsession = Sessions::count('id');

        $session = new Sessions();
        $sessionavg = $session->getAvgSession2();

        $lastuser = new User();
        $last = $lastuser->getLastUsers();

        // 15 prochaine (TROISIEME METHODE )
        $nextsession = Sessions::where('date_session', "<", Carbon::now())->take(15)->get();

        // premiere methode avec 2 jointures :
        $seance = new Sessions();
        $resultseance = $seance->getNextSession();


        $allcategories = Categories::all();

        $alldirectors = Directors::count('id');

        $distrib = new Movies();
        $distributeur = $distrib->countDistributeur();


        $villeacteur = new Actors();
        $villebyacteur = $villeacteur->getVilleByActors();




       // exit(dump($villebyacteur ));


        return view('Main/dashboard', [
            'nbacteurs' => $nbacteurs,
            'nbcommentaire' => $nbcommentaire,
            'avgacteur' =>$avgacteur->age,
            'avgcommentaire' => $avgcommentaire,
            'avgnotepresse' => $avgnotepresse,
            'countnotepresse' => $countnotepresse,
            'moviescount' => $moviescount,
            'avgmovies' => $avgmovies,
            'countnotepresse2' => $countnotepresse2->note,
            'avgsession' => $avgsession,
            'sessionavg' => $sessionavg->date,
            'last' => $last,
            'nextsession' => $nextsession,
            'allcategories' => $allcategories,
            'alldirectors' => $alldirectors,
            'distributeur' => $distributeur,
            'villeacteur' => $villebyacteur,

        ]);


    }
}
?>