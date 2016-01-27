<?php
namespace App\Http\Controllers;

use App\Http\Models\Categories;
use App\Http\Models\Movies;
use App\Http\Requests\MoviesRequest;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class MoviesController extends Controller
{


    public function index()
    {
        //je cree un objet de mon modele Movies
        $movies = Movies::all();



        //je transporte mes donénes au controleur

        return view('Movies/index', [
        'movies' => $movies
        ]);
    }

    public function create()
    {
        $model_categories = new Categories();
        $categories = $model_categories->getAllCategories();

        return view('Movies/create', [

            'categories' => $categories
        ]);

    }


    public function delete($id)
    {
        //iun objet film depuis son ID
        $movie = Movies::find($id);
        if($movie)
        {
            $movie->delete();
            Session::flash('danger' ,"Le film {$movie->title} a bien été supprimé ");
        }

        return Redirect::route('movies_index');
    }


    public function edit($id)
    {
        $movie = Movies::find($id);

        return view('Movies/edit', [

            'movies' => $movie
        ]);
    }


    public function read($id)
    {
        return view('Movies/read');
    }

    //action pour save en bdd les données provide(fournis) par le formulaire
    //Moviesrequest : represente mon formulaire et la requete enPOST de mon formulaire
    // Je rentre dans ma methode si et seulement si je n'ai plus aucune
    // erreur dans mon formulaire
    public function store(MoviesRequest $request, $id = null)
    {
        // $movies->NOMCOLONNEDANSBDD =$request->NAMEINPUT

        if($id == null)
        {
            $movies = new Movies();
        }
        else
        {
            $movies = Movies::find($id);
        }

        $movies->type = $request->type;
        $movies->title = $request->title;
        $movies->synopsis = $request->synopsis;
        $movies->description = $request->description;
        $movies->budget =$request->budget;
        $movies->distributeur = $request->distributeur;
        $movies->duree=$request->duree;
        $movies->date_release=$request->date;
        $movies->visible =$request->visible;
        $movies->cover = $request -> cover;
        $movies->categories_id = $request->categorie;

        $filename ="";
        if($request->hasFile('image'))
        {
            //je recupere mon fichier :
            $file = $request ->file('image');

            //je recupere le nom du fichier :
            $filename =$file->getClientOriginalName();

            //je stock le chemin veers lequel mon image va etre envoyé
            $destinationPath = public_path(). '/uploads/movies';

            //je deplace mon fichier uploader :
            $file->move($destinationPath, $filename);

        }
        $movies->image = asset("uploads/movies/".$filename);

        $movies->save();

        Session::flash('success', "Le film : {$movies->title} a bien été ajouté !");
        return Redirect::route('movies_index');

        //recupere le film de mon film ac la methode POST
        //input (name de mon champ) permet de recuperer la donéne titre de maniere safely
    }

    /*
     * activate : va activer un film via son ID
     */

    public function activate($id)
    {
        $movie = Movies::find($id);

        if($movie->visible == 0 )
        {
            $movie->visible =1;
            Session::flash('success', "Le film {$movie->title} a bien été activé");
        }
        else
        {
            $movie ->visible = 0;
            Session::flash('danger', "Le film {$movie->title} a bien été désactivé");
        }
        //save permet de sauvegarder mon objet modifié en base de données
        $movie ->save();
        return Redirect::route('movies_index');
    }


    public function cover($id)
    {
        $movie = Movies::find($id);

        if($movie ->cover == 1)
        {
            $movie ->cover =0;
            Session::flash('danger', "Le film {$movie->title} a bien été supprimé en cover");
        }
        else
        {
            $movie->cover =1;
            Session::flash('success', "Le film {$movie->title} a bien été mis en cover");
        }

        $movie ->save();
        return Redirect::route('movies_index');
    }



        public function like ($id, $action )
        {
            $movies= Movies::find($id);

            $likes = session('likes', []);

            if($action == "like")
            {
                $likes[$id] = $movies->id;
            }
            else
            {
                unset($likes[$id]);
            }
            Session::put("likes", $likes);
            Session::flash('success', "Le film {$movies->title} a été like");

            return Redirect::route('movies_index');
        }
}



?>
