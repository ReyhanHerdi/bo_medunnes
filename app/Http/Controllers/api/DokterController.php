<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index() {
        $data = Dokter::orderBy('id_dokter', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data is found',
            'data' => $data
        ], 200);
    }

    public function show(int $id) {
    
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'spesialis_id' => 'required',
            'title_depan' => 'required',
            'nama_dokter' => 'required',
            'title_belakang' => 'required',
            'img_dokter' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'tempat_kerja' => 'required',
            'tempat_lulus' => 'required',
            'tgl_mulai_aktif' => 'required',
            'alumni' => 'required',
            'no_reg' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required'
        ]);

        $dokter = new Dokter();
        $dokter->user_id = $request->user_id;
        $dokter->spesialis_id = $request->spesialis_id;
        $dokter->title_depan = $request->title_depan;
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->title_belakang = $request->title_belakang;
        $dokter->img_dokter = $request->img_dokter;
        $dokter->alamat = $request->alamat;
        $dokter->no_tlp = $request->no_tlp;
        $dokter->tempat_kerja = $request->tempat_kerja;
        $dokter->tempat_lulus = $request->tempat_lulus;
        $dokter->tgl_mulai_aktif = $request->tgl_mulai_aktif;
        $dokter->alumni = $request->alumni;
        $dokter->no_reg = $request->no_reg;
        $dokter->jenis_kelamin = $request->jenis_kelamin;
        $dokter->status = $request->status;

        $post = $dokter->save();

        return response()->json([
            'status' => true,
            'message' => 'Insert data success'
        ]);
    }

    public function update(int $id, Request $request) {
        $dokter = Dokter::find($id);
        
        if (empty($pasien)) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ]);
        } else {
            $request->validate([
                'user_id' => 'required',
                'spesialis_id' => 'required',
                'title_depan' => 'required',
                'nama_dokter' => 'required',
                'title_belakang' => 'required',
                'img_dokter' => 'required',
                'alamat' => 'required',
                'no_tlp' => 'required',
                'tempat_kerja' => 'required',
                'tempat_lulus' => 'required',
                'tgl_mulai_aktif' => 'required',
                'alumni' => 'required',
                'no_reg' => 'required',
                'jenis_kelamin' => 'required',
                'status' => ['required', 'date']
            ]);
    
            $dokter->user_id = $request->user_id;
            $dokter->spesialis_id = $request->spesialis_id;
            $dokter->title_depan = $request->title_depan;
            $dokter->nama_dokter = $request->nama_dokter;
            $dokter->title_belakang = $request->title_belakang;
            $dokter->img_dokter = $request->img_dokter;
            $dokter->alamat = $request->alamat;
            $dokter->no_tlp = $request->no_tlp;
            $dokter->tempat_kerja = $request->tempat_kerja;
            $dokter->tempat_lulus = $request->tempat_lulus;
            $dokter->tgl_mulai_aktif = $request->tgl_mulai_aktif;
            $dokter->alumni = $request->alumni;
            $dokter->no_reg = $request->no_reg;
            $dokter->jenis_kelamin = $request->jenis_kelamin;
            $dokter->status = $request->status;
    
            $post = $dokter->save();
    
            return response()->json([
                'status' => true,
                'message' => 'Update data success'
            ]);
        }
    }
}
