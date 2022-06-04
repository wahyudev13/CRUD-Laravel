<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SMasuk;
use App\Models\SKeluar;
use App\Models\Setting;
use App\Models\Kader;

class Report extends Controller
{
    public function suratMasuk(Request $request)
    {
        $das = Setting::get();
        $pagination = 5;
        
        $awal = $request->input('tgl_mulai');
        $akhir = $request->input('tgl_akhir');
        if (empty($awal) && empty($akhir)) {
            $suratmasuk = SMasuk::get();
           
        }else {
            $suratmasuk = SMasuk::whereBetween('tgl_diterima', [$awal,  $akhir])->get();
        }
        $data =['suratmasuk' => $suratmasuk, 'dasboard' => $das];
        return view('report.surat.masuk.table',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function suratKeluar(Request $request)
    {
        $das = Setting::get();
        $pagination = 5;
        
        $awal = $request->input('tgl_mulai');
        $akhir = $request->input('tgl_akhir');
        if (empty($awal) && empty($akhir)) {
            $suratkeluar = SKeluar::get();
           
        }else {
            $suratkeluar = SKeluar::whereBetween('tgl_surat', [$awal,  $akhir])->get();
        }
        $data =['suratkeluar' => $suratkeluar, 'dasboard' => $das];
        return view('report.surat.keluar.table',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function kader(Request $request)
    {
        $das = Setting::get();
        $pagination = 5;
        
        $awal = $request->input('tgl_mulai');
        $akhir = $request->input('tgl_akhir');
        if (empty($awal) && empty($akhir)) {
            $kader = Kader::join('komisariat','kader.id_komisariat','=','komisariat.id_Komisariat')->get();
           
        }else {
            $kader = Kader::join('komisariat','kader.id_komisariat','=','komisariat.id_Komisariat')
            ->whereBetween('tahun', [$awal,  $akhir])
            ->get();
        }
        $data =['kader' => $kader, 'dasboard' => $das];
        return view('report.kader',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
}
