<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $data = User::orderBy('name', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data is found',
            'data' => $data
        ], 200);
    }

    public function show(int $id) {
        $data = User::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data is found',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data is not found',
            ]);
        }
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'type' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->password = Hash::make($request->password);

        $post = $user->save();
        
        return response()->json([
            'status' => true,
            'message' => 'Insert data success'
        ]);
    }
}
