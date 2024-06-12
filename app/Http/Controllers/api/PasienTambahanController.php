<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\PasienTambahan;
use Illuminate\Http\Request;

class PasienTambahanController extends Controller
{
    public function index() {
        $data = PasienTambahan::orderBy('id_pasien_tambahan', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data is found',
            'data' => $data
        ], 200);
    }

    public function show(int $id) {
        $data = PasienTambahan::where('pasien_id', $id)->get();
        return response()->json([
            'status' => true,
            'message' => 'Data is found',
            'data' => $data
        ], 200);
    }

    public function showById(int $pasienId, int $id) {
        $data = PasienTambahan::where('pasien_id', $pasienId)
                                ->where('id_pasien_tambahan', $id)
                                ->first();
        return response()->json([
            'status' => true,
            'message' => 'Data is found',
            'data' => array($data)
        ], 200);
    }

    public function store(Request $request) {
        $request->validate([
            'pasien_id' => 'required',
            'nama_pasien_tambahan' => 'required',
            'TB' => 'required',
            'BB' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'hubungan_keluarga' => 'required'
        ]);

        $pasienTambahan = new PasienTambahan;
        $pasienTambahan->pasien_id = $request->pasien_id;
        $pasienTambahan->nama_pasien_tambahan = $request->nama_pasien_tambahan;
        $pasienTambahan->TB = $request->TB;
        $pasienTambahan->BB = $request->BB;
        $pasienTambahan->jenis_kelamin = $request->jenis_kelamin;
        $pasienTambahan->tgl_lahir = $request->tgl_lahir;
        $pasienTambahan->hubungan_keluarga = $request->hubungan_keluarga;

        $post = $pasienTambahan->save();

        return response()->json([
            'status' => true,
            'message' => 'Insert data success',
        ]);
    }

    public function update(int $id, Request $request) {
        $pasienTambahan = PasienTambahan::find($id);

        if (empty($pasienTambahan)) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ]);
        } else {
            $request->validate([
                'pasien_id' => 'required',
                'nama_pasien_tambahan' => 'required',
                'TB' => 'required',
                'BB' => 'required',
                'jenis_kelamin' => 'required',
                'tgl_lahir' => 'required',
                'hubungan_keluarga' => 'required'
            ]);
    
            $pasienTambahan->pasien_id = $request->pasien_id;
            $pasienTambahan->nama_pasien_tambahan = $request->nama_pasien_tambahan;
            $pasienTambahan->TB = $request->TB;
            $pasienTambahan->BB = $request->BB;
            $pasienTambahan->jenis_kelamin = $request->jenis_kelamin;
            $pasienTambahan->tgl_lahir = $request->tgl_lahir;
            $pasienTambahan->hubungan_keluarga = $request->hubungan_keluarga;
    
            $post = $pasienTambahan->save();
    
            return response()->json([
                'status' => true,
                'message' => 'Update data success',
            ]);
        }
    }

    public function destroy(int $id) {
        $pasienTambahan = PasienTambahan::find($id);
        if ($pasienTambahan) {
            $post = $pasienTambahan->delete();

            return response()->json([
                'status' => true,
                'message' => 'Delete data success',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data is not found',
            ]);
        }
    }
}
