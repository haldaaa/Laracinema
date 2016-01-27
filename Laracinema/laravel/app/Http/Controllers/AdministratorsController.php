<?php
namespace App\Http\Controllers;

use App\Http\Models\Administrators;
use App\Http\Requests\AdministratorRequest;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class AdministratorsController extends Controller
{

    public function index()
    {
        $administrators = Administrators::all();
        return view('Administrators/index',[
            'administrators' => $administrators
        ]);
    }


    public function create()
    {
        return view('Administrators/create');
    }

    public function store(AdministratorRequest $request, $id = null)
    {

        if($id == null)
        {
            $administrator = new Administrators();
        }
        else
        {
            $administrator = Administrators::find($id);
        }

        $administrator->lastname = $request->nom;
        $administrator->firstname = $request->prenom;
        $administrator->email = $request->email;
        $administrator->super_admin = $request->super;
        if(!empty($request->password))
        {
            $administrator->password = bcrypt($request->password);
        }
        $administrator->active= true;
        $administrator->expiration_date= new \DateTime('+1 year');

        $filename ="";
        if($request->hasFile('image'))
        {
            //je recupere mon fichier :
            $file = $request ->file('image');

            //je recupere le nom du fichier :
            $filename =$file->getClientOriginalName();

            //je stock le chemin veers lequel mon image va etre envoyé
            $destinationPath = public_path(). '/uploads/administrator';

            //je deplace mon fichier uploader :
            $file->move($destinationPath, $filename);

        }

        $administrator->photo= asset("uploads/administrator/".$filename);

        $administrator->save();

        Session::flash('success', "L'administrators : {$administrator->firstname} a bien été ajouté !");
        return Redirect::route('administrators_index');

        //recupere le film de mon film ac la methode POST
        //input (name de mon champ) permet de recuperer la donée titre de maniere safely
    }

    public function delete($id)
    {
        //iun objet film depuis son ID
        $administrator = Administrators::find($id);
        if($administrator)
        {
            $administrator->delete();
            Session::flash('danger' ,"Le super admin  {$administrator->firstname} a bien été supprimé ");
        }

        return Redirect::route('administrators_index');
    }


    public function edit($id)
    {
        $administrator = Administrators::find($id);

        return view('Administrators/edit', [

            'administrator' => $administrator
        ]);


    }
}


