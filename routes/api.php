<?php

use App\Http\Controllers\api\Auth\LoginController;
use App\Http\Controllers\Api\DiskusiController;
use App\Http\Controllers\Api\DokterController;
use App\Http\Controllers\Api\JanjiController;
use App\Http\Controllers\Api\KonsultasiController;
use App\Http\Controllers\Api\PasienController;
use App\Http\Controllers\Api\PasienTambahanController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\api\ImageController;
use App\Http\Controllers\api\SesiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/admin', function (Request $request) {
    return $request->admin();
});

// User
Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

// Image
Route::post('pasien/uploadImage/{id}', [ImageController::class, 'pasienImageUpload']);
Route::post('dokter/uploadImage/{id}', [ImageController::class, 'dokterImageUpload']);

// Login
Route::get('login', [LoginController::class, 'loginStatus']);
Route::post('login', [LoginController::class, 'login']);

// Pasien
Route::get('pasien', [PasienController::class, 'index']);
Route::get('pasien/{id}', [PasienController::class, 'show']);
Route::get('pasien/detail/{id}', [PasienController::class, 'showById']);
Route::post('pasien', [PasienController::class, 'store']);
Route::put('pasien/{id}', [PasienController::class, 'update']);
Route::delete('pasien/{id}', [PasienController::class, 'destroy']);

// Pasien Tambahan
Route::get('pasienTambahan', [PasienTambahanController::class, 'index']);
Route::get('pasienTambahan/{id}', [PasienTambahanController::class, 'show']);
Route::get('pasienTambahan/{pasienId}/{id}', [PasienTambahanController::class, 'showById']);
Route::post('pasienTambahan', [PasienTambahanController::class, 'store']);
Route::put('pasienTambahan/{id}', [PasienTambahanController::class, 'update']);
Route::delete('pasienTambahan/{id}', [PasienTambahanController::class, 'destroy']);

// Dokter
Route::get('dokter', [DokterController::class, 'index']);
Route::get('dokter/{id}', [DokterController::class, 'show']);
Route::get('dokter/detail/{id}', [DokterController::class, 'showById']);
Route::post('dokter', [DokterController::class, 'store']);
Route::put('dokter/{id}', [DokterController::class, 'update']);
Route::delete('dokter/{id}', [DokterController::class, 'destroy']);

// Konsultasi
Route::get('konsultasi', [KonsultasiController::class, 'index']);
Route::get('konsultasi/{id}', [KonsultasiController::class, 'show']);
Route::get('konsultasi/dokter/{id}', [KonsultasiController::class, 'showByDokter']);
Route::get('konsultasi/pasien/{id}', [KonsultasiController::class, 'showByPasien']);
Route::post('konsultasi', [KonsultasiController::class, 'store']);
Route::put('konsultasi/{id}', [KonsultasiController::class, 'update']);
Route::delete('konsultasi/{id}', [KonsultasiController::class, 'destroy']);

// Diskusi
Route::get('diskusi', [DiskusiController::class, 'index']);
Route::get('diskusi/{id}', [DiskusiController::class, 'show']);
Route::post('diskusi', [DiskusiController::class, 'store']);
Route::put('diskusi/{id}', [DiskusiController::class, 'update']);
Route::delete('diskusi/{id}', [DiskusiController::class, 'destroy']);

// Janji
Route::get('janji', [JanjiController::class, 'index']);
Route::get('janji/{id}', [JanjiController::class, 'show']);
Route::post('janji', [JanjiController::class, 'store']);
Route::put('janji/{id}', [JanjiController::class, 'update']);
Route::delete('janji/{id}', [JanjiController::class, 'destroy']);

// Rating
Route::get('rating', [RatingController::class, 'index']);
Route::post('rating', [RatingController::class, 'store']);

// Sesi
Route::get('sesi', [SesiController::class, 'index']);