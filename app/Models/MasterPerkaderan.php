<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPerkaderan extends Model
{
    use HasFactory;
    protected $table = 'tb_perkaderan';
    protected $fillable = ['id_per','nama_perka','kategori'];
    protected $primaryKey = 'id_per';

}
