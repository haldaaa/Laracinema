<?php

namespace App\Http\Controllers;

use App\Http\Models\Categories;
use App\Http\Requests\CategoriesRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    public function index()
    {
      $categories = Categories::all();


        return view('Categories/index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('Categories/create');
    }

    public function delete($id)
    {
        //iun objet film depuis son ID
        $categorie = Categories::find($id);
        $categorie->delete();
        Session::flash('danger' ,"La categorie {$categorie->title} a bien été supprimé ");
        return Redirect::route('categories_index');


    }

    public function read()
    {
        return view('Categories/read');
    }

    public function edit($id)
    {
        $categories = Categories::find($id);

        return view('Categories/edit', [

            'categories' => $categories
        ]);

    }

    public function store(CategoriesRequest $request, $id = null)
    {
        if($id == null)
        {
            $categories = new Categories();
        }
        else
        {
            $categories = Categories::find($id);
        }

        $categories->title = $request->titre;
        $categories->description = $request->description;

        $categories->save();

        Session::flash('success', "La categorie : {$categories->title} a bien été ajouté !");
        return Redirect::route('categories_index');

        //recupere le film de mon film ac la methode POST
        //input (name de mon champ) permet de recuperer la donéne titre de maniere safely
    }

}



?>