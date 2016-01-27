<?php
namespace App\Http\Controllers;


use App\Http\Models\Commentaire;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;

class CommentaireController extends Controller
{

    public function index()
    {

        $model = new Commentaire();
        $comment = $model ->getAllComment();
        return view('Commentaires/index', [
            'comment' => $comment
        ]);
    }


    public function like($id, $action )
    {
        $commentaire= Commentaire::find($id);

        $likes = session('favoris', []);

        if($action == "favoris")
        {
            $likes[$id] = $commentaire->id;
        }
        else
        {
            unset($likes[$id]);
        }
        Session::put("favoris", $likes);
        Session::flash('success', "Le commentaire numero ' {$commentaire->id}'  a été like");

        return Redirect::route('commentaires_index');
    }
}


