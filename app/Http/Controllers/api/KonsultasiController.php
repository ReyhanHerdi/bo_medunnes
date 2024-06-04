<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Konsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    // public function index() {
    //     $data = Konsultasi::orderBy('id_konsultasi', 'asc')->get();
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Data is found',
    //         'data' => $data
    //     ], 200);
    // }

    // public function show(int $id) {
    //     $data = Konsultasi::find($id);
    //     if (empty($data)) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Data not found'
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Data found',
    //             'data' => $data
    //         ]);
    //     }
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

    //     $pasienTambahan = new Konsultasi();
    //     $pasienTambahan->pasien_id = $request->pasien_id;
    //     $pasienTambahan->nama_pasien_tambahan = $request->nama_pasien_tambahan;
    //     $pasienTambahan->TB = $request->TB;
    //     $pasienTambahan->BB = $request->BB;
    //     $pasienTambahan->jenis_kelamin = $request->jenis_kelamin;
    //     $pasienTambahan->tgl_lahir = $request->tgl_lahir;
    //     $pasienTambahan->hubungan_keluarga = $request->hubungan_keluarga;

    //     $post = $pasienTambahan->save();

    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Insert data success',
    //     ]);
    // }

    // public function update(int $id, Request $request) {
    //     $pasienTambahan = PasienTambahan::find($id);

    //     if (empty($pasienTambahan)) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Data not found'
    //         ]);
    //     } else {
    //         $request->validate([
    //             'pasien_id' => 'required',
    //             'nama_pasien_tambahan' => 'required',
    //             'TB' => 'required',
    //             'BB' => 'required',
    //             'jenis_kelamin' => 'required',
    //             'tgl_lahir' => ['required', 'date'],
    //             'hubungan_keluarga' => 'required'
    //         ]);
    
    //         $pasienTambahan->pasien_id = $request->pasien_id;
    //         $pasienTambahan->nama_pasien_tambahan = $request->nama_pasien_tambahan;
    //         $pasienTambahan->TB = $request->TB;
    //         $pasienTambahan->BB = $request->BB;
    //         $pasienTambahan->jenis_kelamin = $request->jenis_kelamin;
    //         $pasienTambahan->tgl_lahir = $request->tgl_lahir;
    //         $pasienTambahan->hubungan_keluarga = $request->hubungan_keluarga;
    
    //         $post = $pasienTambahan->save();
    
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Update data success',
    //         ]);
    //     }
    // }
}
