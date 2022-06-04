<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komisariat extends Model
{
    use HasFactory;
    protected $table = 'komisariat';
    protected $fillable = ['id_komisariat','nama_komisariat','fakultas','univ','logo','created_at','updated_at'];
    protected $primaryKey = 'id_komisariat';
}
