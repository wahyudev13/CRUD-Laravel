<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;
use File;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $das = Setting::get();
        $getsetting = Setting::where('id_setting','1')->first();
        $data = ['getsetting' => $getsetting, 'dasboard' => $das];
        return view('setting.setting',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.setting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasfile('logo')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('logo')->getClientOriginalName());
            $request->file('logo')->move(public_path('file/setting'), $filename);
            
            $inserted = Setting::create([
            'nama_organisasi' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'telp' => $request->input('telp'),
            'logo' => $filename
            ]);

        }
        if ($inserted) {
           return back();
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
        $getsetting = Setting::where('id_setting',$id)->first();
        $data = ['getsetting' => $getsetting, 'dasboard' => $das];
        return view('setting.editsetting',$data);
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
        if ($request->hasfile('logo')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('logo')->getClientOriginalName());
            $request->file('logo')->move(public_path('file/setting'), $filename);

            $gernamefile = Setting::where('id_setting','1')->first();
            File::delete(public_path('file/setting/').$gernamefile->logo);
            
            $inserted = Setting::where('id_setting','1')->update([
            'nama_organisasi' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'telp' => $request->input('telp'),
            'logo' => $filename
            ]);

        }else {
            $inserted = Setting::where('id_setting','1')->update([
                'nama_organisasi' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'telp' => $request->input('telp'),
              
                ]);
        }
        if ($inserted) {
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
        //
    }
}
