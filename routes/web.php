<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasuk;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KomController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\SuratKeluar;
use App\Http\Controllers\Report;
use App\Http\Controllers\Login;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/formulir', [Login::class,'formulir']);

Route::post('/formulir/store',[Login::class,'storeformulir']);

Route::middleware(['CekSession'])->group(function () {
    //Login LOgout
    Route::get('/',[Login::class,'index']);

  
});

Route::post('/authenticate',[Login::class,'login']);



Route::middleware(['CekLogin'])->group(function () {
        //Logot
    Route::get('/logout', [Login::class, 'logout'])->name('logout');

    //Dashboard
    Route::get('/dashboard',[DasboardController::class,'index']);

    //Surat Masuk
    Route::get('/surat',[SuratMasuk::class, 'index']);
    Route::get('/formsuratmasuk',[SuratMasuk::class,'create']);
    Route::post('/surat/masuk/store',[SuratMasuk::class,'store']);
    Route::get('/surat/masuk/edit/{id}',[Suratmasuk::class,'edit']);
    Route::post('/surat/masuk/update',[SuratMasuk::class,'update']);
    Route::get('/surat/masuk/hapus/{id}',[SuratMasuk::class,'destroy']);

    //Surat keluar
    Route::get('/surat/keluar',[SuratKeluar::class,'index']);
    Route::get('/surat/keluar/create',[SuratKeluar::class,'create']);
    Route::post('/surat/keluar/store',[SuratKeluar::class,'store']);
    Route::get('/surat/keluar/edit/{id}',[SuratKeluar::class,'edit']);
    Route::post('/surat/keluar/update',[SuratKeluar::class,'update']);
    Route::get('/surat/keluar/hapus/{id}',[SuratKeluar::class,'destroy']);
    //Pengguna
    Route::get('/pengguna',[PenggunaController::class,'index']);
    Route::get('/formpengguna',[PenggunaController::class,'form']);
    Route::post('/pengguna/store',[PenggunaController::class,'store']);
    Route::get('/pengguna/hapus/{id}',[PenggunaController::class,'destroy']);
    Route::get('/pengguna/edit/{id}',[PenggunaController::class,'edit']);
    Route::post('/pengguna/update',[PenggunaController::class,'update']);

    //komisariat
    Route::get('/komisariat',[KomController::class,'index']);
    Route::get('/formkomisariat',[KomController::class,'formkom']);
    Route::post('/komisariat/store',[KomController::class,'store']);
    Route::get('/komisariat/hapus/{id}',[KomController::class,'destroy']);
    Route::get('/komisariat/edit/{id}',[KomController::class,'edit']);
    Route::post('/komisariat/update',[KomController::class,'update']);

    //Kader
    Route::get('/kader',[KaderController::class,'index']);
    Route::get('/formkader',[KaderController::class,'create']);
    Route::post('/kader/store',[KaderController::class,'store']);
    Route::get('/kader/edit/{id}',[KaderController::class,'edit']);
    Route::post('/kader/update',[KaderController::class,'update']);
    Route::get('/kader/hapus/{id}',[KaderController::class,'destroy']);

    //Setting
    Route::get('/setting/{id}',[SettingController::class,'index']);
    Route::get('/setting/edit/{id}',[SettingController::class,'edit']);
    Route::post('/setting/store',[SettingController::class,'store']);
    Route::post('/setting/update',[SettingController::class,'update']);

    //Report
    Route::get('/report/surat/masuk',[Report::class,'suratMasuk']);
    Route::get('/report/surat/keluar',[Report::class,'suratKeluar']);
    Route::get('/report/kader',[Report::class,'kader']);

    //profile
    Route::get('/profile',[PenggunaController::class,'profile']);
    Route::get('/account/password',[PenggunaController::class,'gantipsw']);
    Route::post('/account/password/ubah', [PenggunaController::class, 'ubahpsw']);
});
