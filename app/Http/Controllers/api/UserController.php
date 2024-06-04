<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $data = User::orderBy('name', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data was found',
            'data' => $data
        ], 200);
    }
}
