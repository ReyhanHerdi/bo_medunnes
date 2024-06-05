<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Diskusi;
use Illuminate\Http\Request;

class DiskusiController extends Controller
{
    public function index() {
        $data = Diskusi::orderBy('id_diskusi', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data is found',
            'data' => $data
        ], 200);
    }

    public function show(int $id) {
        $data = Diskusi::find($id);
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
            'konsultasi_id' => 'required',
            'pasien_id' => 'required',
            'message' => 'required'
        ]);

        $diskusi = new Diskusi();
        $diskusi->konsultasi_id = $request->konsultasi_id;
        $diskusi->pasien_id = $request->pasien_id;
        $diskusi->message = $request->message;

        $post = $diskusi->save();

        return response()->json([
            'status' => true,
            'message' => 'Insert data success',
        ]);
    }

    public function update(int $id, Request $request) {
        $diskusi = Diskusi::find($id);

        if (empty($diskusi)) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ]);
        } else {
            $request->validate([
                'konsultasi_id' => 'required',
                'pasien_id' => 'required',
                'message' => 'required'
            ]);
    
            $diskusi->konsultasi_id = $request->konsultasi_id;
            $diskusi->pasien_id = $request->pasien_id;
            $diskusi->message = $request->message;
    
            $post = $diskusi->save();
    
            return response()->json([
                'status' => true,
                'message' => 'Update data success',
            ]);
        }
    }

    public function destroy(int $id) {
        $diskusi = Diskusi::find($id);
        if ($diskusi) {
            $post = $diskusi->delete();

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
