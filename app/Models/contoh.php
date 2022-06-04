<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contoh extends Model
{
    use HasFactory;
    protected $table = 'coba';
    protected $fillable = ['id_coba','id_kader','nama_perkaderan','created_at','updated_at'];
    protected $primaryKey = 'id_coba';
}
