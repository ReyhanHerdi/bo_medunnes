<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index() {
        $data = Pasien::orderBy('id_pasien', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data is found',
            'data' => $data
        ], 200);
    }

    public function show(int $id) {
        $pasien = Pasien::find($id);
        if ($pasien) {
            return response()->json([
                'status' => true,
                'message' => 'Delete data success',
                'data' => $pasien
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data is not found',
            ]);
        }
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'nik' => 'required',
            'nama_pasien' => 'required',
            'img_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'TB' => 'required',
            'BB' => 'required',
            'status' => 'required'
        ]);

        $pasien = new Pasien;
        $pasien->user_id = $request->user_id;
        $pasien->nik = $request->nik;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->img_pasien = $request->img_pasien;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->alamat = $request->alamat;
        $pasien->no_tlp = $request->no_tlp;
        $pasien->TB = $request->TB;
        $pasien->BB = $request->BB;
        $pasien->status = $request->status;

        $post = $pasien->save();

        return response()->json([
            'status' => true,
            'message' => 'Insert data success'
        ]);
    }

    public function update(int $id, Request $request) {
        $pasien = Pasien::find($id);
        
        if (empty($pasien)) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ]);
        } else {
            $request->validate([
                'user_id' => 'required',
                'nik' => 'required',
                'nama_pasien' => 'required',
                'img_pasien' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'no_tlp' => 'required',
                'TB' => 'required',
                'BB' => 'required',
                'status' => 'required'
            ]);
    
            $pasien->user_id = $request->user_id;
            $pasien->nik = $request->nik;
            $pasien->nama_pasien = $request->nama_pasien;
            $pasien->img_pasien = $request->img_pasien;
            $pasien->jenis_kelamin = $request->jenis_kelamin;
            $pasien->alamat = $request->alamat;
            $pasien->no_tlp = $request->no_tlp;
            $pasien->TB = $request->TB;
            $pasien->BB = $request->BB;
            $pasien->status = $request->status;
    
            $post = $pasien->save();
    
            return response()->json([
                'status' => true,
                'message' => 'Update data success'
            ]);
        }
    }

    public function destroy(int $id) {
        $pasien = Pasien::find($id);
        if ($pasien) {
            $post = $pasien->delete();

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
