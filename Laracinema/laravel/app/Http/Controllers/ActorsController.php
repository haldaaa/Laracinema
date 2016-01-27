<?php
namespace App\Http\Controllers;

use App\Http\Models\Actors;

use App\Http\Requests\ActorsRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ActorsController extends Controller
{
    public function index()
    {
        $actors = Actors::all();


        return view('Actors/index', [
            'actors' => $actors
        ]);
    }

    public function create()
    {
        return view('Actors/create');
    }

    public function read()
    {
        return view('Actors/read');
    }

    public function delete($id)
    {
        //iun objet film depuis son ID
        $actor = Actors::find($id);
        if($actor)
        {
            $actor->delete();
            Session::flash('success', "Monsieur {$actor->firstname} a bien été supprime !");
            return Redirect::route('actors_index');


        }
        Session::flash('success', "Monsieur a bien été supprime !");
        return Redirect::route('actors_index');

    }

    public function edit()
    {
        return view('Actors/edit');
    }

    public function store(ActorsRequest $request)
    {
       $actors = new Actors();

        $actors->firstname = $request->nom;
        $actors->lastname = $request->prenom;
        $actors->dob = $request ->dob;
        $actors->nationality= $request->nationalite;
        $actors->image =$request->image;

        $filename ="";
        if($request->hasFile('image'))
        {
            //je recupere mon fichier :
            $file = $request ->file('image');

            //je recupere le nom du fichier :
            $filename =$file->getClientOriginalName();

            //je stock le chemin veers lequel mon image va etre envoyé
            $destinationPath = public_path(). '/uploads/actors';

            //je deplace mon fichier uploader :
            $file->move($destinationPath, $filename);

        }

        $actors->image = asset("uploads/movies/".$filename);

        $actors->save();

        Session::flash('success', "L\'acteur {$actors->nom} a été ajouté");
        return Redirect::route('actors_index');

        //recupere le film de mon film ac la methode POST
        //input (name de mon champ) permet de recuperer la donéne titre de maniere safely
    }
}


?>