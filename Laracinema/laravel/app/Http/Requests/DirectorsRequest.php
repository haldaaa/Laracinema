<?php


namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;

class DirectorsRequest extends FormRequest
{

    public function rules()
    {
        return

            [

                'biographie' => 'required|min:50',
                'nom' => 'required|min:2|max:75',
                'prenom' => 'required|min:2|max:75',

            ];
    }

    public function messages()
    {

        return
            [
                'nom.min' => 'Le nom doit faire de plus de 2 caracteres',
                'required' => 'Ce champ est obligatoire',
                'min' => 'Ce champ doit faire plus de :min caracteres ! ',
                'max' => 'Ce champ doit faire moins de :max caractères',
                'integer' => 'Ce champ doit être un chiffre',
                'regex' => ' Mauvais format, merci d\'enrengistrer un :attributes valide ' ,
                'date_format' => "Format date incorect",
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
?>