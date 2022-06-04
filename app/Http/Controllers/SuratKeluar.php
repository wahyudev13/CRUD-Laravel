<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\SKeluar;
use Illuminate\Http\Request;
use File;
class SuratKeluar extends Controller
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
        $showkeluar = SKeluar::orderBy('created_at','desc')->get();
        $data = ['dasboard' => $das, 'suratkeluar' => $showkeluar];
        return view('surat.keluar.keluar',$data)->with('i',($request->input('page',1)-1)*$pagination);
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
        return view('surat.keluar.form_surat_keluar',$data);
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
            'tgl_surat'=> 'required',
            'perihal'=> 'required',
            'lampiran'=> 'required',
            'tujuan'=> 'required',
            'file.*'=> 'mimes:jpg,png,pdf,doc,docx|max:10000'
        ]);
        if ($request->hasfile('file')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('file')->getClientOriginalName());
            $request->file('file')->move(public_path('file/suratkeluar'), $filename);
            
            $inserted = SKeluar::create([
                'no_surat' => $request->input('no_surat'),
                'tgl_surat' => $request->input('tgl_surat'),
                'perihal' => $request->input('perihal'),
                'lampiran' => $request->input('lampiran'),
                'tujuan' => $request->input('tujuan'),
                'file' => $filename
            ]);
        }
        if ($inserted) {
           return back()->withSuccess('Surat Keluar Berhasil Disimpan');
        }else {
            return back()->withFail('Surat Keluar Gagal Disimpan');
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
        $getbyid = SKeluar::where('id_surat_keluar',$id)->first();
        $data = ['dasboard' => $das,'suratkeluar' => $getbyid];
        return view('surat.keluar.editsuratkeluar',$data);
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
        if ($request->hasfile('file')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('file')->getClientOriginalName());
            $request->file('file')->move(public_path('file/suratkeluar'), $filename);
            //Delete file
            $gernamefile = Skeluar::where('id_surat_keluar',$request->input('id'))->first();
            File::delete(public_path('file/suratkeluar/').$gernamefile->file);
            //update Data
            $inserted = SKeluar::where('id_surat_keluar',$request->input('id'))->update([
                'no_surat' => $request->input('no_surat'),
                'tgl_surat' => $request->input('tgl_surat'),
                'perihal' => $request->input('perihal'),
                'lampiran' => $request->input('lampiran'),
                'tujuan' => $request->input('tujuan'),
                'file' => $filename
            ]);
        }else {
            $inserted = SKeluar::where('id_surat_keluar',$request->input('id'))->update([
                'no_surat' => $request->input('no_surat'),
                'tgl_surat' => $request->input('tgl_surat'),
                'perihal' => $request->input('perihal'),
                'lampiran' => $request->input('lampiran'),
                'tujuan' => $request->input('tujuan'),
               
            ]);
        }
        if ($inserted) {
           return back()->withSuccess('Surat Keluar Berhasil Disimpan');
        }else {
            return back()->withFail('Surat Keluar Gagal Disimpan');
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
        $getname = SKeluar::where('id_surat_keluar',$id)->first();
        $del = SKeluar::where('id_surat_keluar',$id)->delete();
        File::delete(public_path('file/suratkeluar/').$getname->file);
        if ($del) {
           return back()->withSuccess('Data Berhasil Dihapus');
        }else {
            return back()->withFail('Data Gagal Dihapus');
        }

    }
}
