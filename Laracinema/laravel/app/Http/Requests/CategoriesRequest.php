<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
{

    public function rules()
    {
        $id = $this->route('id');

        if($id == null)
        {

            return
                [
                    'titre' => 'required|min:10',
                    'description' => 'required|min:10'

                ];
        }
        else
        {
            return
                [
                    'titre' => 'min:10',
                    'description' => 'min:10'
                ];
        }

    }


    public function message()
    {
        return
        [
            'min' => "Taille minimum non respecte",
            'required' => "Champs requis",
        ];

    }



    public function authorize()
    {
        return true ;
    }
}