<?php

namespace App\Http\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
    {
    protected $table = 'user';


        public function getLastUsers()
        {

          $user = User::orderBy('created_at')->take(24)->get();



            return $user;
        }

    }