<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kader extends Model
{
    use HasFactory;
    protected $table = 'kader';
    protected $fillable = ['id_kader','nim','nama','nomor','alamat','tempat','tanggal','id_komisariat','tahun','jabatan','posisi','foto','created_at','updated_at'];
    protected $primaryKey = 'id_kader';
}
