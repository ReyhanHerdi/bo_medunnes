<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\janji;
use Illuminate\Http\Request;

class JanjiController extends Controller
{
    public function index() {
        $data = janji::orderBy('id_janji', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data is found',
            'data' => $data
        ], 200);
    }

    public function show(int $id) {
        $data = janji::find($id);
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
            'pasien_tambahan_id' => 'required',
            'sesi_id' => 'required',
            'datetime' => 'required',
            'catatan' => 'required',
            'status' => 'required',
        ]);

        $janji = new janji();
        $janji->pasien_id = $request->pasien_id;
        $janji->dokter_id = $request->dokter_id;
        $janji->pasien_tambahan_id = $request->pasien_tambahan_id;
        $janji->sesi_id = $request->sesi_id;
        $janji->datetime = $request->datetime;
        $janji->catatan = $request->catatan;
        $janji->status = $request->status;

        $post = $janji->save();

        return response()->json([
            'status' => true,
            'message' => 'Insert data success',
        ]);
    }

    public function update(int $id, Request $request) {
        $janji = janji::find($id);

        if (empty($janji)) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ]);
        } else {
            $request->validate([
                'pasien_id' => 'required',
                'dokter_id' => 'required',
                'pasien_tambahan_id' => 'required',
                'sesi_id' => 'required',
                'datetime' => 'required',
                'catatan' => 'required',
                'status' => 'required',
            ]);
    
            $janji->pasien_id = $request->pasien_id;
            $janji->dokter_id = $request->dokter_id;
            $janji->pasien_tambahan_id = $request->pasien_tambahan_id;
            $janji->sesi_id = $request->sesi_id;
            $janji->datetime = $request->datetime;
            $janji->catatan = $request->catatan;
            $janji->status = $request->status;
    
            $post = $janji->save();
    
            return response()->json([
                'status' => true,
                'message' => 'Update data success',
            ]);
        }
    }

    public function destroy(int $id) {
        $janji = janji::find($id);
        if ($janji) {
            $post = $janji->delete();

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
