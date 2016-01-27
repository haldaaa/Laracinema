<?php

namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;

class MoviesRequest extends FormRequest
{

    public function rules()
    {
        $id = $this->route('id');

        if($id == null)
        {
            return

                [
                    'type' => 'required|in:long-metrage,court-metrage',

                    'title' => 'required|min:2|unique:movies',
                    'synopsis' => 'required|min:10|max:200',
                    'description' => 'required|min:50',
                    'date_release' => 'required|date_format:d/m/Y|after:now',
                    'image' => 'required|image',

                ];
        }
        else
        {
            return

                [
                    'type' => 'in:long-metrage,court-metrage',

                    'title' => 'min:2|unique:movies',
                    'synopsis' => 'min:10|max:200',
                    'description' => 'min:50',
                    'date_release' => 'date_format:d/m/Y|after:now',
                    'image' => 'image',

                ];

        }
    }

    public function messages()
    {

        return
            [
                'required' => 'Ce champ est obligatoire',
                'min' => 'Ce champ doit faire plus de :min caracteres ! ',
                'max' => 'Ce champ doit faire moins de :max caractères',
                'integer' => 'Ce champ doit être un chiffre',
                'regex' => ' Mauvais format, merci d\'enrengistrer un :attributes valide ' ,
                'date_format' => 'Mauvais format de date',
                'date_release.after' =>  'La date doit etre superieur a aujourdhui ! ',
                'image' => ' Le format de l\'image est invalide ' ,
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