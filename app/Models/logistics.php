<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class logistics extends Authenticatable
{
    // protected $table = 'logistics';
    protected $primaryKey = 'LID';
    protected $fillable = ['email', 'password'];
}
