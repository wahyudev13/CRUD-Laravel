<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\Komisariat;
use Illuminate\Http\Request;
use File;
class KomController extends Controller
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
        $getdata = Komisariat::get();
        $data = ['komisariat' => $getdata, 'dasboard' => $das];
        return view('master.komisariat.komisariat',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }

    public function formkom()
    {
        $das = Setting::get();
        $data = ['dasboard' => $das];
        return view('master.komisariat.formkomisariat',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'komisariat' => 'required',
            'fakultas' => 'required',
            'univ' => 'required',
            'logo.*' => 'mimes:jpg,png|max:10000'
            
        ]);

        if ($request->hasfile('logo')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('logo')->getClientOriginalName());
            $request->file('logo')->move(public_path('file/logo'), $filename);
            
            $query_insert = Komisariat::create([
                'nama_komisariat' => $request->input('komisariat'),
                'fakultas' => $request->input('fakultas'),
                'univ' => $request->input('univ'),
                'logo' => $filename
            ]);
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
        $edit = Komisariat::where('id_komisariat',$id)->first();
        $data = ['getdata' => $edit, 'dasboard' => $das];
        return view('master.komisariat.editkomisariat',$data);
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
            'komisariat' => 'required',
            'fakultas' => 'required',
            'univ' => 'required',
            'logo.*' => 'mimes:jpg,png|max:10000'
            
        ]);
        if ($request->hasfile('logo')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('logo')->getClientOriginalName());
            $request->file('logo')->move(public_path('file/logo'), $filename);
            
            $update = Komisariat::where('id_komisariat',$request->input('cid'))->update([
                'nama_komisariat' => $request->input('komisariat'),
                'fakultas' => $request->input('fakultas'),
                'univ' => $request->input('univ'),
                'logo' => $filename
            ]);
        }else {
            $update = Komisariat::where('id_komisariat',$request->input('cid'))->update([
                'nama' => $request->input('komisariat'),
                'fakultas' => $request->input('fakultas'),
                'univ' => $request->input('univ')
            ]);
        }
        if ($update) {
            return back()->withSuccess('Data Berhasil Diubah');
        }else {
            return back()->withFail('Data Gagal Dihapus');
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
        try {
            
            $delfile = Komisariat::where('id_komisariat',$id)->first();
            File::delete(public_path('file/logo/').$delfile->logo);
            
            $delete = Komisariat::where('id_komisariat',$id)->delete();
           
            return back()->withSuccess('Data Berthasil Dihapus');
            
        } catch (\Throwable $th) {
            return back()->withFail('Data Gagal Dihapus');
        }
    }
}
