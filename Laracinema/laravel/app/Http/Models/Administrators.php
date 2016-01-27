<?php
namespace App\Http\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;


use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract ;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Support\Facades\DB;


/**
 * je dois implementer des 3 interfaces
 * pour que mes classe model amdinistrators
 * puisse être support d'authentiffication,
 * d'autorisation et de mise à zero du mdp
 *
 * Class Administrators
 * @package App\Http\Models
 */

class Administrators extends Model
    implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{


    use Authenticatable, Authorizable, CanResetPassword;

    protected $table ='administrators';

}