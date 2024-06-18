<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    use HasFactory;
    protected $table = 'rapat';
    protected $fillable = ['id_rapat','uuid','nama_rapat','tgl_rapat','status','created_at','updated_at'];
    protected $primaryKey = 'id_rapat';
}
