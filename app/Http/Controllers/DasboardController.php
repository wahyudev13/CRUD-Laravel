<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\SMasuk;
use App\Models\SKeluar;
use App\Models\Komisariat;
use App\Models\Kader;
use Illuminate\Support\Facades\DB;
class DasboardController extends Controller
{
    public function index()
    {
        
       $das = Setting::get();
       $smasuk = SMasuk::count();
       $skeluar = SKeluar::count();
       $kom = Komisariat::count();
       $kader = Kader::count();

       $getkom = Komisariat::get();
     
      //  foreach ($getkom as $value) {
      //     $tampung [] = $value->id_komisariat;
      //  }
      //  $datakom = $tampung;
      
      //  $tes = Komisariat::where('id_komisariat',$datakom)->get();
      //  foreach ($tes as $value2) {
      //     $tampung2 [] = $value2->nama_komisariat;
      //  }
    //    $nama = $tampung2;
    //    dd($nama);


      //  $kader3 = Kader::join('komisariat','kader.id_komisariat','=','komisariat.id_Komisariat')
      //           ->where('komisariat.id_Komisariat',$datakom)
      //           ->groupBy('kader.id_komisariat')
      //           ->count();
      
       $jml_surat = SMasuk::select(DB::raw('count(*) as surat_count'))
                     ->GroupBy(DB::raw("MONTH(tgl_diterima)"))
                     ->pluck('surat_count');

       $bulan = SMasuk::select(DB::raw('MONTHNAME(tgl_diterima) as bulan'))
                     ->GroupBy(DB::raw("MONTHNAME(tgl_diterima)"))
                     ->orderBy('tgl_diterima', 'asc')
                     ->pluck('bulan');
      // dd($bulan);

       $jml_surat_keluar = SKeluar::select(DB::raw('count(*) as surat_keluar'))
                     ->GroupBy(DB::raw("MONTH(tgl_surat)"))
                     ->pluck('surat_keluar');

       $bulan_keluar = SKeluar::select(DB::raw('MONTHNAME(tgl_surat) as bulan_keluar'))
                     ->GroupBy(DB::raw("MONTHNAME(tgl_surat)"))
                     ->orderBy('tgl_surat', 'asc')
                     ->pluck('bulan_keluar');
      
      //   dd($bulan);
        $data = ['dasboard' => $das, 
                'smasuk'=> $smasuk ,
                'skeluar' => $skeluar,
                'kom'=>$kom,
                'kader'=>$kader, 
                'getkom' => $getkom,
                'jumlah_surat' => $jml_surat,
                'bulan' => $bulan,
                'jml_keluar' => $jml_surat_keluar,
                'bulan_keluar' => $bulan_keluar
            ];
       return view('dashboard',$data);
    }
}
