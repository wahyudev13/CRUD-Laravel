<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\contoh;
class contohSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        contoh::create([
            'id_coba'	=>'4',
            'id_kader'	=> 'sss',
            'nama_perkaderan'	=> 'DAM',
        ]);
    }
}
