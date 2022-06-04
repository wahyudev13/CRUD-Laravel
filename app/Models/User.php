<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Config;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'pengguna';
    protected $fillable = ['id_pengguna','nim','nama','username','password','level','created_at','updated_at'];
    protected $primaryKey = 'id_pengguna';
}
