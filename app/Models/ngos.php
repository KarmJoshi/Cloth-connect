<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ngos extends Authenticatable
{
   
    protected $table = 'ngos';
    protected $primaryKey = 'NID';
    protected $fillable = ['email', 'password'];

    protected $hidden = ['password', 'remember_token'];
}
