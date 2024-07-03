<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Catatan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class CatatanController extends Controller
{
    public function index(int $id) {
        $data = Catatan::where('konsultasi_id', $id)->get();
        return response()->json([
            'status' => true,
            'message' => 'Data found',
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'konsultasi_id' => 'required',
            'gejala' => 'required',
            'diagnosis' => 'required',
            'catatan' => 'required'
        ]);

        try {
            $catatan = new Catatan();
            $catatan->konsultasi_id = $request->konsultasi_id;
            $catatan->gejala = $request->gejala;
            $catatan->diagnosis = $request->diagnosis;
            $catatan->catatan = $request->catatan;

            $post = $catatan->save();

            return response()->json([
                'status' => true,
                'message' => 'Insert data success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Insert data fail',
                'error' => $th
            ]);
        }
    }

    public function update(Request $request, int $id) {
        $catatan = Catatan::find($id);

        try {
            $request->validate([
                'konsultasi_id' => 'required',
                'gejala' => 'required',
                'diagnosis' => 'required',
                'catatan' => 'required'
            ]);

            $catatan->konsultasi_id = $request->konsultasi_id;
            $catatan->gejala = $request->gejala;
            $catatan->diagnosis = $request->diagnosis;
            $catatan->catatan = $request->catatan;

            $post = $catatan->save();

            return response()->json([
                'status' => true,
                'message' => 'Update data success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Insert data fail',
                'error' => $th->getMessage()
            ]);
        }
    }
}
