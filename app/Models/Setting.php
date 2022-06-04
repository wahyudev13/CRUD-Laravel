<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'setting';
    protected $fillable = ['id_setting','nama_organisasi','alamat','telp','logo'];
    protected $primaryKey = 'id_setting';
}
