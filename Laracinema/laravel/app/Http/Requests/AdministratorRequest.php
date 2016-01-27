<?php
namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;

class AdministratorRequest extends FormRequest
{

    public function rules()
    {

            //depuis ma route je peux recuperer un argument "id"
        $id = $this->route('id');

        //si cet argument est nul
        if($id == null)
        {


            return

                [


                    'nom' => 'required|min:2|max:75',
                    'prenom' => 'required|min:2|max:75',
                    'image' => 'required|image',
                    'password' => 'required|confirmed',
                    'email'  => 'required|email|unique:administrators',

                ];
        }
        else
        {
            return

                [


                    'nom' => 'required|min:2|max:75',
                    'prenom' => 'required|min:2|max:75',
                    'image' => 'image',
                    'password' => 'confirmed',
                    'email'  => 'required|email|unique:administrators,email,' .$id,
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
                'image' => 'Mauvais format',
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
