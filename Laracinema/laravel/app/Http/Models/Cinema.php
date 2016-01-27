<?php

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cinema extends Model
{
    protected $table = 'cinema';

    public function getAllCinema()
    {
        return DB::table('cinema')->get();
    }

}


?>