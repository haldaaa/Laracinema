<?php
namespace App\Http\Controllers;
use App\Http\Requests\DirectorsRequest;
use Illuminate\Http\Request;
use App\Http\Models\Directors;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DirectorsController extends Controller
{
    public function index()
    {

        $directors = Directors::all();
        return view('Directors/index', [
            'directors' => $directors
        ]);
    }

    public function create()
    {
        return view('Directors/create');
    }

    public function read($id)
    {
        return view('Directors/read');
    }

    public function edit($id)
    {
        return view('Directors/edit');
    }

    public function delete($id)
    {
        $director = Directors::find($id);
        $director->delete();
        Session::flash('danger', "Le directeur {$director->name} a été supprimé");
        return Redirect::route('directors_index');

    }

    public function store(DirectorsRequest $request)
    {
        $directors = new Directors();

        $directors ->firstname = $request->nom;
        $directors->lastname = $request->prenom;
        $directors->dob = $request->dob;


        $filename ="";
        if($request->hasFile('image'))
        {
            //je recupere mon fichier :
            $file = $request ->file('image');

            //je recupere le nom du fichier :
            $filename =$file->getClientOriginalName();

            //je stock le chemin veers lequel mon image va etre envoyé
            $destinationPath = public_path(). '/uploads/directors';

            //je deplace mon fichier uploader :
            $file->move($destinationPath, $filename);

        }

        $directors->save();

        Session::flash('success', "Le réalisateur {$directors->firstname} a été ajouté");
        return Redirect::route('directors_index');

        //recupere le film de mon film ac la methode POST
        //input (name de mon champ) permet de recuperer la donéne titre de maniere safely
    }

}


?>
