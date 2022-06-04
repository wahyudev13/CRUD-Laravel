<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMasuk extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk';
    protected $fillable = ['id_surat_masuk','no_surat','tgl_surat','tgl_diterima','perihal','jenis','jml_lampiran','pengirim','file','created_at','updated_at'];
    protected $primaryKey = 'id_surat_masuk';
}
