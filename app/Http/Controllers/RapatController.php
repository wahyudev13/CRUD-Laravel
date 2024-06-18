<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use App\Models\Rapat;
use App\Models\Rekaprapat;
use Illuminate\Support\Str;
use File;
class RapatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $das = Setting::get();
        $pagination =5 ;
        $getrapat = Rapat::get();
        $data =['rapat' => $getrapat ,'dasboard' => $das];
        return view('rapat.datarapat',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $das = Setting::get();
        $data =['dasboard' => $das];
       return view('rapat.formrapat',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
        'nama' => 'required',
        'tgl' => 'required'
       ]);
       $uuid = Str::uuid();
       if ($validated) {
            $simpanrapat = Rapat::create([
                'uuid' => $uuid,
                'nama_rapat' => $request->input('nama'),
                'tgl_rapat' => $request->input('tgl'),
                'status' => 'aktif'
            ]);
       }
        if ($simpanrapat) {
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
        $edit = Rapat::where('id_rapat',$id)->first();
        $das = Setting::get();
        $data =['dasboard' => $das,'rapat' => $edit];

        return view('rapat.editrapat',$data);

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
        $validated = $request->validate([
            'nama' => 'required',
            'tgl' => 'required'
           ]);
        
        if ($validated) {
            $updaterapat = Rapat::where('id_rapat',$request->input('cid'))->update([
                'nama_rapat' => $request->input('nama'),
                'tgl_rapat' => $request->input('tgl'),
                'status' => $request->input('status')
            ]);
        }
        if ($updaterapat) {
            return back()->withSuccess('Data Berhasil Diganti');
        }else {
            return back()->withFail('Data Gagal Diganti');
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
        $delete = Rapat::where('id_rapat',$id)->delete();
        if ($delete) {
            return back()->withSuccess('Data Berhasil Dihapus');
        }else {
            return back()->withFail('Data Gagal Dihapus');
        }
    }

    public function rekap($id)
    {
        $das = Setting::get();

        $datarapat = Rapat::where('uuid',$id)->get();
        $statusrapat = "";
        $namarapat ="";
        foreach ($datarapat as $item){
           $statusrapat .= $item->status;
           $namarapat .= $item->nama_rapat;
        }

        $status = $statusrapat;
        $nrapat = $namarapat;

        $data = ['dasboard'=> $das ,'datarapat' => $datarapat, 'status' => $status ,'namarapat' => $nrapat];
        return view('rekap_rapat',$data);
    }

    public function storerekap(Request $request)
    {
       $validate = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'kegiatan' => 'required',
            'foto' => 'required',
       ]);

       if ($request->hasfile('foto')) {

        $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
        $request->file('foto')->move(public_path('file/bukti_rapat'), $filename);
        
        $insert_rekap = Rekaprapat::create([
           'nama_kader' => $request->input('nama'),
           'jabatan' => $request->input('jabatan'),
           'id_rapat' => $request->input('idrapat'),
           'catatan' => $request->input('catatan'),
           'bukti_foto' => $filename
        ]);

       }

        if ($insert_rekap) {
            return back()->withSuccess('Data Berhasil Disimpan');
        }else {
            return back()->withFail('Data Gagal Disimpan');
        }
    }

    public function hasil(Request $request)
    {
        $das = Setting::get();
        $pagination =5 ;
        $hasilrekap = Rekaprapat::join('rapat','rekap_rapat.id_rapat','=','rapat.id_rapat')->get();
        $data =['hasil' => $hasilrekap ,'dasboard' => $das];
        return view('rapat.hasil_rapat',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }

    public function destroyrekap($id)
    {
        $rekap = Rekaprapat::where('id_rekap',$id)->first();
        File::delete(public_path('file/bukti_rapat/').$rekap->bukti_foto);
        $delete_rekap = Rekaprapat::where('id_rekap',$id)->delete();
        if ($delete_rekap) {
            return back()->withSuccess('Data Berhasil Dihapus');
        }else {
            return back()->withFail('Data Gagal Dihapus');
        }

    }
}
