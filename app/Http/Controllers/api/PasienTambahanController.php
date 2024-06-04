<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\PasienTambahan;
use Illuminate\Http\Request;

class PasienTambahanController extends Controller
{
    // public function index() {
    //     $data = PasienTambahan::orderBy('id_pasien_tambahan', 'asc')->get();
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Data is found',
    //         'data' => $data
    //     ], 200);
    // }

    // public function show(int $id) {
    
    // }

    // public function store(Request $request) {
    //     $request->validate([
    //         'pasien_id' => 'required',
    //         'nama_pasien_tambahan' => 'required',
    //         'TB' => 'required',
    //         'BB' => 'required',
    //         'jenis_kelamin' => 'required',
    //         'tgl_lahir' => ['required', 'date'],
    //         'hubungan_keluarga' => 'required'
    //     ]);

    //     $pasienTambahan = new PasienTambahan
    //     $pasienTambahan->pasien_id
    // }
}
