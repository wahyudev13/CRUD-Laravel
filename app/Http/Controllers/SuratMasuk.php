<?php

namespace App\Http\Controllers;
use App\Models\Kader;
use App\Models\Setting;
use App\Models\SMasuk;
use Illuminate\Http\Request;
use File;

class SuratMasuk extends Controller
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
        $get = SMasuk::orderBy('created_at','desc')->get();
        $data = ['suratmasuk' => $get, 'dasboard' => $das];
        return view('surat.masuk.masuk',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $das = Setting::get();
        $data = ['dasboard' => $das];
        return view('surat.masuk.form_surat_masuk', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'no_surat' => 'required',
            'tgl_diterima'=> 'required',
            'tgl_surat'=> 'required',
            'perihal'=> 'required',
            'jenis'=> 'required',
            'lampiran'=> 'required',
            'pengirim'=> 'required',
            'file.*'=> 'mimes:jpg,png,pdf,doc,docx|max:10000'
        ]);
        if ($request->hasfile('file')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('file')->getClientOriginalName());
            $request->file('file')->move(public_path('file/suratmasuk'), $filename);
            
            $inserted = SMasuk::create([
                'no_surat' => $request->input('no_surat'),
                'tgl_surat' => $request->input('tgl_surat'),
                'tgl_diterima' => $request->input('tgl_diterima'),
                'perihal' => $request->input('perihal'),
                'jenis' => $request->input('jenis'),
                'jml_lampiran' => $request->input('lampiran'),
                'pengirim' => $request->input('pengirim'),
                'file' => $filename
            ]);
        }
        if ($inserted) {
           return back()->withSuccess('Surat Masuk Berhasil Disimpan');
        }else {
            return back()->withFail('Surat Masuk Gagal Disimpan');
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
        $getData = SMasuk::where('id_surat_masuk',$id)->first();
        $data = ['masukid' => $getData, 'dasboard' => $das];
        return view('surat.masuk.editsuratmasuk',$data);
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
        $validate = $request->validate([
            'no_surat' => 'required',
            'tgl_diterima'=> 'required',
            'tgl_surat'=> 'required',
            'perihal'=> 'required',
            'jenis'=> 'required',
            'lampiran'=> 'required',
            'pengirim'=> 'required',
            'file.*'=> 'mimes:jpg,png,pdf,doc,docx|max:10000'
        ]);
        $id = $request->input('cid');
        if ($request->hasfile('file')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('file')->getClientOriginalName());
            $request->file('file')->move(public_path('file/suratmasuk'), $filename);
            //Delete file
            $gernamefile = SMasuk::where('id_surat_masuk',$id)->first();
            File::delete(public_path('file/suratmasuk/').$gernamefile->file);
            //update Data
            $inserted = SMasuk::where('id_surat_masuk',$id)->update([
                'no_surat' => $request->input('no_surat'),
                'tgl_surat' => $request->input('tgl_surat'),
                'tgl_diterima' => $request->input('tgl_diterima'),
                'perihal' => $request->input('perihal'),
                'jenis' => $request->input('jenis'),
                'jml_lampiran' => $request->input('lampiran'),
                'pengirim' => $request->input('pengirim'),
                'file' => $filename
            ]);
        }else {
            $inserted = SMasuk::where('id_surat_masuk',$id)->update([
                'no_surat' => $request->input('no_surat'),
                'tgl_surat' => $request->input('tgl_surat'),
                'tgl_diterima' => $request->input('tgl_diterima'),
                'perihal' => $request->input('perihal'),
                'jenis' => $request->input('jenis'),
                'jml_lampiran' => $request->input('lampiran'),
                'pengirim' => $request->input('pengirim'),
            ]);
        }
        if ($inserted) {
           return back()->withSuccess('Surat Masuk Berhasil Diubah');
        }else {
            return back()->withFail('Surat Masuk Gagal Diubah');
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
        $getfile = SMasuk::where('id_surat_masuk',$id)->first();
        File::delete(public_path('file/suratmasuk/').$getfile->file);
        $delete = SMasuk::where('id_surat_masuk',$id)->delete();
        if ($delete){
            return back()->withSuccess('Surat Masuk Berhasil Dihapus');
        }else {
            return back()->withFail('Surat Masuk Gagal Dihapus');
        }
    }
}
