<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkaderan extends Model
{
    use HasFactory;
    protected $table = 'perkaderan';
    protected $fillable = ['id_perkaderan','id_kader','nama_perkaderan','kategori','created_at','updated_at'];
    protected $primaryKey = 'id_perkaderan';
}
