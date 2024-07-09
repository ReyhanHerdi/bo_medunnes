<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index() {
        $data = Artikel::get();
        return response()->json([
            'status' => true,
            'message' => 'Data found',
            'data' => $data
        ]);
    }
}
