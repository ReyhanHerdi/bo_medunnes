<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Konsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index() {
        $data = Konsultasi::with('pasien')
                            ->with('dokter')
                            ->get();
        return response()->json([
            'status' => true,
            'message' => 'Data is found',
            'data' => $data
        ], 200);
    }

    public function show(int $id) {
        $data = Konsultasi::find($id)
                            ->with('pasien')
                            ->with('dokter')
                            ->first();
        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data
            ]);
        }
    }

    public function showByPasien(int $id) {
        $data = Konsultasi::where('pasien_id', $id)
                            ->with('pasien')
                            ->with('dokter')
                            ->get();
        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data
            ]);
        }
    }

    public function showByDokter(int $id) {
        $data = Konsultasi::where('dokter_id', $id)
                            ->with('pasien')
                            ->with('dokter')
                            ->get();
        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data found',
                'data' => $data
            ]);
        }
    }

    public function store(Request $request) {
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'topik' => 'required'
        ]);

        $konsultasi = new Konsultasi();
        $konsultasi->pasien_id = $request->pasien_id;
        $konsultasi->dokter_id = $request->dokter_id;
        $konsultasi->topik = $request->topik;

        $post = $konsultasi->save();

        return response()->json([
            'status' => true,
            'message' => 'Insert data success',
        ]);
    }

    public function update(int $id, Request $request) {
        $konsultasi = Konsultasi::find($id);

        if (empty($konsultasi)) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ]);
        } else {
            $request->validate([
                'pasien_id' => 'required',
                'dokter_id' => 'required',
                'topik' => 'required'
            ]);
    
            $konsultasi->pasien_id = $request->pasien_id;
            $konsultasi->dokter_id = $request->dokter_id;
            $konsultasi->topik = $request->topik;
    
            $post = $konsultasi->save();
    
            return response()->json([
                'status' => true,
                'message' => 'Update data success',
            ]);
        }
    }

    public function destroy(int $id) {
        $konsultasi = Konsultasi::find($id);
        if ($konsultasi) {
            $post = $konsultasi->delete();

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
