<?php

use App\Http\Controllers\api\PasienController;
use App\Http\Controllers\api\PasienTambahanController;
use App\Http\Controllers\api\UserController;
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

// Pasien
Route::get('pasien', [PasienController::class, 'index']);
Route::post('pasien', [PasienController::class, 'store']);
Route::post('pasien/{id}', [PasienController::class, 'update']);

// Pasien Tambahan
Route::get('pasienTambahan', [PasienTambahanController::class, 'index']);
Route::post('pasienTambahan', [PasienTambahanController::class, 'store']);
Route::post('pasienTambahan/{id}', [PasienTambahanController::class, 'update']);