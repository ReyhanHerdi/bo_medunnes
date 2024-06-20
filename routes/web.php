<?php

use App\Http\Controllers\antarmuka\ChatController;
use App\Http\Controllers\antarmuka\DashboardController;
use App\Http\Controllers\antarmuka\LoginController;
use App\Http\Controllers\antarmuka\PasienviewController;
use App\Http\Controllers\antarmuka\RegistrasiController;
use App\Http\Controllers\api\ImageController;
use App\Models\Pasien;
use App\Models\Spesialis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\AkunController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\DosenController;
use App\Http\Controllers\backend\DokterController;
use App\Http\Controllers\backend\PasienController;
use App\Http\Controllers\backend\SpesialisController;
use App\Http\Controllers\backend\KonsultasiController;
use App\Http\Controllers\backend\UsermanagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
        return view('welcome');
});



Route::get('/daftarpoli', [PasienviewController::class, 'daftarpoli'])->name('daftarpoli');
Route::get('/daftardokter', [PasienviewController::class, 'daftardokter'])->name('daftardokter');
Route::get('/chat/index', [ChatController ::class, 'index'])->name('chat');
Route::post('/chat/send-message', [ChatController::class, 'sendMessage'])->name('chat.send-message');
Route::get('/masuk', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/masuk', [LoginController::class, 'masuk'])->name('masuk');

Route::get('/registrasi', [RegistrasiController::class,'showRegistrationForm'])->name('registrasi');
Route::post('/registrasi', [RegistrasiController::class, 'registrasi']);

Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
Route::get('/dashboard2', [DashboardController::class,'dashboard2'])->name('dashboard2');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware'=>'is-ban'], function(){
//     Route::get('/home',[HomeController::class, 'index'])->name('home');
//     Route::get('list_pasien',[PasienController::class,'index'])->name('pasien.index');
//     Route::post('userBan',[PasienController::class,'ban'])->name('pasien.ban');
//     Route::get('userUserRevoke/{id}',[PasienController::class,'revoke'])->name('pasien.revokepasien');
// });

Route::get('/home',[HomeController::class, 'index'])->name('home');

Route::get('/list_akun', [AkunController::class,'index'])->name('akun.index');
Route::get('/list_dosen', [DosenController::class,'index'])->name('dosen.index');

Route::get('/list_pasien',[PasienController::class,'index'])->name('listpasien');
Route::post('/insert_pasien', [PasienController::class, 'store'])->name('pasien.store');

// update status pasien
Route::get('/edit_pasien/{id}', [PasienController::class,'edit'])->name('pasien.edit');
Route::post('/update_pasien/{id}', [PasienController::class,'update'])->name('pasien.update');

Route::get('/admin/profile/{id}', [AdminController::class,'show'])->name('admin.profile.show');

Route::get('/list_dokter', [DokterController::class, 'index'])->name('listdokter');
Route::get('/create_dokter', [DokterController::class, 'create'])->name('dokter.create');
Route::post('/insert_dokter', [DokterController::class, 'store'])->name('dokter.store');
Route::get('/edit_dokter/{id}', [DokterController::class, 'edit'])->name('dokter.edit');
Route::post('/update_dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');
Route::delete('/hapus_dokter/{id}', [DokterController::class,'destroy'])->name('dokter.destroy');
Route::get('/show_dokter/{id}', [DokterController::class,'show'])->name('dokter.show');
Route::get('/dokter/{id}/history', 'DokterController@getHistory')->name('dokter.history');
Route::get('/dokter/{id}/rating', [DokterController::class, 'showRatingModal'])->name('dokter.rating');
Route::post('/dokter/{mahasiswa_id}/rating', [DokterController::class, 'storeRating'])->name('dokter.rating.store');



// Route::get('view_admin', [UsermanagementController::class, 'index'])->name('admin.index');

Route::get('list_konsultasi', [KonsultasiController::class,'index'])->name('konsultasi.index');
// hapus konsultasi
// Route::get('/hapus_konsultasi/{id}', [App\Http\Controllers\backend\KonsultasiController::class,'destroy'])->name('konsultasi.destroy');
Route::get('list_konsultasi/cetak_pdf', [KonsultasiController::class])->name('konsultasi.cetak_pdf');
Route::delete('/hapus_konsultasi/{id}', [KonsultasiController::class,'destroy'])->name('konsultasi.destroy');

// spesialis
Route::get('list_spesialis', [SpesialisController::class,'index'])->name('spesialis.index');
Route::get('create_spesialis', [SpesialisController::class,'store'])->name('spesialis.store');
Route::delete('/hapus_spesialis/{id}', [SpesialisController::class,'destroy'])->name('spesialis.destroy');

Route::get('activity', [App\Http\Controllers\backend\ActivitylogController::class,'index'])->name('activity.index');


// Route::get('list_akun', [UsermanagementController::class,'UserList'])->name('user.index');
// Route::get('/edit_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserEdit']);
// Route::post('/update_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserUpdate']);
// Route::get('/delete_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserDelete']);

// Route::get('/ban-user', function () {
//     $pasien = Pasien::findOrFail(2);
//     $pasien->ban();
// });

// Route banned pasien
// Route::get('/ban-pasien/{id}', [App\Http\Controllers\backend\PasienController::class,'PasienBan']);
// Route::get('/unban-pasien/{id}', [App\Http\Controllers\backend\PasienController::class,'PasienUnban']);
