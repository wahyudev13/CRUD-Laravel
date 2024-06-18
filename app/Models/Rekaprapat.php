<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekaprapat extends Model
{
    use HasFactory;
    protected $table = 'rekap_rapat';
    protected $fillable = ['nama_kader','jabatan','id_rapat','catatan','bukti_foto','created_at','updated_at'];
}
