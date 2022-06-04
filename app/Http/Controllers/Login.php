<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use App\Models\Kader;
use App\Models\Perkaderan;
use App\Models\Komisariat;
use App\Models\MasterPerkaderan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Haruncpi\LaravelIdGenerator\IdGenerator;
class Login extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $das = Setting::get();
        $data = ['dasboard' => $das];
        return view('login',$data);
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data2 = User::where('username',$request->input('username'))->first();
      
        if ($data2) {
                $cekpas = Hash::check($request->input('password'),$data2->password);
                if ($cekpas) {
                    Auth::attempt($credentials);
                    $request->session()->regenerate();
                    session(['login_berhasil' => 'true']);
                    return redirect('/dashboard');
                }else {
                    return back()->withFail('Password Salah ');
                }
        }else {
            return back()->withFail('User Tidak Ditemukan');
        }
        // $credentials = $request->validate([
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);
 
        // if (Auth::attempt()) {
        //     //dd($request->user()->password);
        //     if (Hash::check($request->input('password'), $request->user()->password)) {
        //         $request->session()->regenerate();
        //         return redirect()->intended('/dashboard');
                
        //     }else {
        //         return back()->withFail('Password Salah');
        //     }
        // }
        // return back()->withFail('Gagal Login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createhash()
    {
        $hashpassword = Hash::make(170602054);
        echo $hashpassword;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function formulir()
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
        return view('formulirkader',$data);
    }
    public function storeformulir(Request $request)
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
            return back()->withSuccess('Terimaksih, Data Berhasil Ditambahkan');
        }else {
            return back()->withFail('Data Gagal Ditambahkan');
        }
    }
}
