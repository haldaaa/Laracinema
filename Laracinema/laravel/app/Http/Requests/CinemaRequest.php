<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CinemaRequest extends FormRequest
{
    public function rules()
    {
        return

            [


                'nom' => 'required|min:2|max:75',
                'adresse' => 'required|min:15|max:200',

            ];
    }

    public function messages()
    {

        return
            [
                'nom.min' => "Le nom du cinéma est trop petit ...",
                'adresse.min' => "Adresse incomplète " ,
            ];

    }

    /*
     * authorise l'acces au formulaire pour tout
     * mes users
     */

    public function authorize()
    {
        return true ;
    }
}

?>
