<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Commentaire extends Model
{
    /* Décrit le nom de la table que ma classe fait référence
     * @var string
     */
    protected $table = 'comments';

    public function getAllComment()
    {
        return DB::table('comments')->get();
    }


}