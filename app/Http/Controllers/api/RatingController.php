<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index() {
        $data = Rating::orderBy('dokter_id', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data is found',
            'data' => $data
        ], 200);
    }

    public function store(Request $request) {
        $request->validate([
            'dokter_id' => 'required',
            'pasien_id' => 'required',
            'rating' => 'required'
        ]);

        $rating = new Rating();
        $rating->dokter_id = $request->dokter_id;
        $rating->pasien_id = $request->pasien_id;
        $rating->rating = $request->rating;

        $post = $rating->save();

        return response()->json([
            'status' => true,
            'message' => 'Insert data success',
        ]);
    }
}
