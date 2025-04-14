<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;

    protected $table = 'clients'; // Specify the correct table
    protected $primaryKey = 'CID';
    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];
}

?>