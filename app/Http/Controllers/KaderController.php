<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\Komisariat;
use App\Models\Kader;
use App\Models\Perkaderan;
use App\Models\MasterPerkaderan;
use Illuminate\Http\Request;
use File;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $das = Setting::get();
        $pagination = 5;
        $kader = Kader::join('komisariat','kader.id_komisariat','=','komisariat.id_Komisariat')->get();
        $data = ['getkader' => $kader, 'dasboard' => $das];
        return view('master.kader.kader',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $das = Setting::get();
        $kom = Komisariat::get();
        $Masterutama = MasterPerkaderan::where('kategori','utama')->get();
        $Masterkhusus = MasterPerkaderan::where('kategori','khusus')->get();

        $data= ['getkom' => $kom, 
                'getutama' => $Masterutama,
                'getKhusus'=> $Masterkhusus,
                'dasboard' => $das
            ];
        return view('master.kader.formkader',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'notelp' =>'required' ,
            'alamat' => 'required',
            'tempat' => 'required',
            'tgllahir' => 'required',
            'kom' => 'required',
            'masuk' => 'required',
            'jabatan' => 'required',
            'posisi' => 'required',
            'utama' => 'required',
            'foto.*' => 'mimes:jpg,png|max:10000'
        ]);


        $id_kader = IdGenerator::generate(['table' => 'kader','field' => 'id_kader','length' => 6, 'prefix' => date('y')]);
        if ($request->hasfile('foto')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
            $request->file('foto')->move(public_path('file/foto'), $filename);
            
            $query_insert = Kader::create([
                'id_kader' => $id_kader,
                'nim' => $request->input('nim'),
                'nama' => $request->input('nama'),
                'nomor' => $request->input('notelp'),
                'alamat' => $request->input('alamat'),
                'tempat' => $request->input('tempat'),
                'tanggal' => $request->input('tgllahir'),
                'id_komisariat' => $request->input('kom'),
                'tahun' => $request->input('masuk'),
                'jabatan' => $request->input('jabatan'),
                'posisi' => $request->input('posisi'),
                'foto' =>   $filename
            ]);
        }
        $utama = $request->input('utama');
        foreach ($utama as $value) {
             $perkaderan = Perkaderan::create([
            'id_kader' => $id_kader,
            'kategori' => 'utama',
            'nama_perkaderan' => $value
            ]);
        }
        $khusus = $request->input('khusus');
        if ($khusus != "") {
            foreach ($khusus as $value2) {
                $perkaderan2 = Perkaderan::create([
                    'id_kader' => $id_kader,
                    'kategori' => 'khusus',
                    'nama_perkaderan' => $value2
                    ]);
            }
        }
        
        
       
        if ($query_insert) {
            return back()->withSuccess('Data Berhasil Ditambahkan');
        }else {
            return back()->withFail('Data Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $das = Setting::get();
        $kom = Komisariat::get();
        $edit = Kader::where('kader.id_kader',$id)->first();
        
        $getUtama = MasterPerkaderan::where('kategori','utama')->get();
        $getKhusus = MasterPerkaderan::where('kategori','khusus')->get();
        //Utama
        $getid = Perkaderan::select('nama_perkaderan')->where('kategori','utama')->where('id_kader',$id)->get();
        $perKader = [];
        foreach ($getid as $value) {
           $perKader[] = $value['nama_perkaderan'];
        }
        //Khusus
        $getidkhusus= Perkaderan::select('nama_perkaderan')->where('kategori','khusus')->where('id_kader',$id)->get();
        $perKaderkhusus = [];
        foreach ($getidkhusus as $value2) {
           $perKaderkhusus[] = $value2['nama_perkaderan'];
        }

        $data= ['getder'=>$edit,
                'getkom' => $kom,
                'getperutama' => $perKader,
                'getUtama' => $getUtama,
                'getKhusus' => $getKhusus,
                'getperkhusus' => $perKaderkhusus,
                'dasboard' => $das
               
            ];
        return view('master.kader.editkader',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->hasfile('foto')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
            $request->file('foto')->move(public_path('file/foto'), $filename);
            
            $update = Kader::where('id_kader',$request->input('id_kader'))->update([
                'nim' => $request->input('nim'),
                'nama' => $request->input('nama'),
                'nomor' => $request->input('notelp'),
                'alamat' => $request->input('alamat'),
                'tempat' => $request->input('tempat'),
                'tanggal' => $request->input('tgllahir'),
                'id_komisariat' => $request->input('kom'),
                'tahun' => $request->input('masuk'),
                'jabatan' => $request->input('jabatan'),
                'posisi' => $request->input('posisi'),
                'foto' =>   $filename
            ]);
        }else {
            $update = Kader::where('id_kader',$request->input('id_kader'))->update([
                'nim' => $request->input('nim'),
                'nama' => $request->input('nama'),
                'nomor' => $request->input('notelp'),
                'alamat' => $request->input('alamat'),
                'tempat' => $request->input('tempat'),
                'tanggal' => $request->input('tgllahir'),
                'id_komisariat' => $request->input('kom'),
                'tahun' => $request->input('masuk'),
                'jabatan' => $request->input('jabatan'),
                'posisi' => $request->input('posisi'),
            ]);
        }
        //Utama
        $utama = $request->input('utama');
        $listUtama = Perkaderan::where('id_kader',$request->input('id_kader'))->where('kategori','utama')->get();

        $list_value = [];
        foreach ($listUtama as $value) {
            $list_value [] = $value['nama_perkaderan'];
        }
        //Insert Value Selected
        foreach ($utama as $valueutama) {
           if (!in_array($valueutama, $list_value)) {
            //    echo $valueutama."Insert here";
              $insert = Perkaderan::create([
                  'id_kader' => $request->input('id_kader'),
                  'nama_perkaderan' => $valueutama,
                  'kategori' => 'utama'

              ]);
           }
        }
        //Delete Value 
        foreach ($list_value as $listrow) {
           if (!in_array($listrow, $utama)) {
            //    echo $listrow."Delete here One";
            $delete = Perkaderan::where('id_kader',$request->input('id_kader'))
                                    ->where('nama_perkaderan',$listrow)->delete();
           }
        }


        ///////////////////////////Khusus
        $khusus = $request->input('khusus');
        if ($khusus == "") {
            $delete = Perkaderan::where('id_kader',$request->input('id_kader'))
                                    ->where('kategori','khusus')->delete();
        }else {
            $listKhusus = Perkaderan::where('id_kader',$request->input('id_kader'))->where('kategori','khusus')->get();
            $list_value_kuhsus= [];
            foreach ($listKhusus as $value2) {
                $list_value_kuhsus [] = $value2['nama_perkaderan'];
            }
            //Insert Value Selected
            foreach ($khusus as $valuekhusus) {
               if (!in_array($valuekhusus, $list_value_kuhsus)) {
                //    echo $valueutama."Insert here";
                  $insertkhusus= Perkaderan::create([
                      'id_kader' => $request->input('id_kader'),
                      'nama_perkaderan' => $valuekhusus,
                      'kategori' => 'khusus'
    
                  ]);
               }
            }
            //Delete Value 
            foreach ($list_value_kuhsus as $listrow2) {
               if (!in_array($listrow2, $khusus)) {
                //    echo $listrow."Delete here One";
                $delete = Perkaderan::where('id_kader',$request->input('id_kader'))
                                        ->where('nama_perkaderan',$listrow2)->delete();
               }
            }
        }
        

       
       
        if ($update) {
            return back()->withSuccess('Data Berhasil Diubah');
        }else {
            return back()->withFail('Data Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delfile = Kader::where('id_kader',$id)->first();
        File::delete(public_path('file/foto/').$delfile->foto);
        $delete = Kader::where('id_kader',$id)->delete();
        if ($delete) {
            return back()->withSuccess('Data Berhasil dihapus');
        }else {
            return back()->withFail('Data Gagal Dihapus');
        }
    }
}
