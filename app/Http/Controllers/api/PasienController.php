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
        $pasien = Pasien::where('user_id', $id)->first();
        if ($pasien) {
            return response()->json([
                'status' => true,
                'message' => 'Data is found',
                'data' => array($pasien)
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data is not found',
            ]);
        }
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'user_id' => 'required',
                'NIK' => 'required',
                'nama_pasien' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'no_tlp' => 'required',
                'TB' => 'required',
                'BB' => 'required',
                'status' => 'required'
            ]);
    
            $pasien = new Pasien;
            $pasien->user_id = $request->user_id;
            $pasien->NIK = $request->NIK;
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
                'message' => 'Insert data success',
                'data' => array($pasien)
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => true,
                'message' => 'Insert data fail',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function update(int $id, Request $request) {
        $pasien = Pasien::where('user_id', $id)->first();
        
        if (empty($pasien)) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ]);
        } else {
            try {
                $request->validate([
                    'user_id' => 'required',
                    'NIK' => 'required',
                    'nama_pasien' => 'required',
                    'jenis_kelamin' => 'required',
                    'alamat' => 'required',
                    'no_tlp' => 'required',
                    'TB' => 'required',
                    'BB' => 'required',
                    'status' => 'required'
                ]);
        
                $pasien->user_id = $request->user_id;
                $pasien->NIK = $request->NIK;
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
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => 'Update data fail',
                    'info' => $th->getMessage()
                ]);
            }
        
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
