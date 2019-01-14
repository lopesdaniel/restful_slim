<?php
/**
 * Created by PhpStorm.
 * User: Alucard
 * Date: 13/01/2019
 * Time: 19:42
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


class User extends Eloquent
{
    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password'];

    public function setPasswordAttribute($key, $value)
    {
        if(!empty($value)){
            $this->attributes['password'] = password_hash($value, PASSWORD_DEFAULT);
        }
    }

}