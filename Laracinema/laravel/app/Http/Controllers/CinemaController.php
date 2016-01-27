<?php

namespace App\Http\Controllers;


use App\Http\Models\Cinema;
use App\Http\Requests\CinemaRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CinemaController extends Controller
{

    public function index()
    {
        $model = new Cinema();
        $cinema = $model ->getAllCinema();
        return view('Cinema/index', [
            'cinema' => $cinema
        ]);

    }

    public function create()
    {
        return view('Cinema/create');
    }



    public function store(CinemaRequest $request)
    {

        $cinema = new Cinema();

        $cinema ->title = $request->nom;
        $cinema ->ville = $request->adresse;

        $cinema->save();

        Session::flash('success', "Le cinéma {$cinema->title} a été ajouté");
        return Redirect::route('cinema_index');

    }

    public function delete($id)
    {
        $cinema = Cinema::find($id);

        if($cinema)
        {
            $cinema->delete();
            Session::flash('danger', "Le cinema {$cinema->title} a été supprimé");
        }

        return Redirect::route('cinema_index');
    }



}


?>