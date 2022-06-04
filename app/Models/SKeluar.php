<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKeluar extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar';
    protected $fillable = ['id_surat_keluar','no_surat','tgl_surat','perihal','lampiran','tujuan','file','created_at','updated_at'];
    protected $primarykey = 'id_surat_keluar';
}
