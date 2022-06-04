<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Setting;

class PenggunaController extends Controller
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
        $tampil = User::get();
        $data =['tampilpengguna' => $tampil, 'dasboard' => $das];
        return view('master.pengguna.pengguna',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }

    public function form()
    {
        $das = Setting::get();
        $data =['dasboard' => $das];
      return view('master.pengguna.formpengguna',$data);
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
            'nim' => 'required|unique:pengguna',
            'nama' => 'required',
            'username' => 'required|unique:pengguna',
            'psw' => 'required',
            'level' => 'required'

        ]);
        if ($validated) {
            $hashpassword = Hash::make($request->input('psw'));
            $querysimpan = User::create([
                'nim' => $request->input('nim'),
                'nama' => $request->input('nama'),
                'username' => $request->input('username'),
                'password' =>  $hashpassword,
                'level' => $request->input('level')
            ]);
        }
        if ($querysimpan) {
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
        $datapengguna = User::where('id_pengguna',$id)->first();
        $data = ['datapengguna' => $datapengguna, 'dasboard'=>$das];
        return view('master.pengguna.editpengguna',$data);
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
        $hashpassword = Hash::make($request->input('psw'));
        $update = User::where('id_pengguna',$request->input('cid'))->update([
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'username' => $request->input('username'),
            'password' =>  $hashpassword,
            'level' => $request->input('level')
        ]);
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
        $delete = User::where('id_pengguna',$id)->delete();
        if ($delete) {
            return back()->withSuccess('Data Berhasil Dihapus');
        }else {
            return back()->withFail('Data Gagal Dihapus');
        }
    }
    public function profile()
    {
        $das = Setting::get();
        $data = ['dasboard'=>$das];
        return view('profile',$data);
    }
    public function gantipsw()
    {
        $das = Setting::get();
        $data = ['dasboard'=>$das];
        return view('gantipsw',$data);
    }
    public function ubahpsw(Request $request)
    {
        $password1 = $request->input('pass1');
        $password2 = $request->input('pass2');

        if ($password2 == $password1) {
            $hashpassword = Hash::make($password2);
            $update = User::where('id_pengguna',$request->input('cid'))->update([
            'password' =>  $hashpassword
        ]);
            if ($update) {
                
                $request->session()->flush();
                $request->session()->invalidate();

                $request->session()->regenerateToken();
                return redirect('/');
            }
        
        }else {
            return back()->withFail('Ketik Ulang Password');
        }
    }
}
