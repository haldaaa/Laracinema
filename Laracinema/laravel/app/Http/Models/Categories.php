<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Categories extends Model
{
    /* Décrit le nom de la table que ma classe fait référence
     * @var string
     */
    protected $categories = 'categories';

    public function getAllCategories()
    {
        return DB::table('categories')->get();
    }

    /*
     * le nom dela methode movies doit porter le nom de la table mise en relation
     */
    public function movies()
    {
        return $this->hasMany('App\Http\Models\Movies');
    }

}


?>