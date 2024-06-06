<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function loginStatus() {
        $auth = auth()->guard('api');
        if (!$auth->check()) {
            return response()->json([
                'status' => false,
                'message' => 'Not login yet',
                'user' => $auth->user()
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Already login',
            'user' => $auth->user()
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $crendetials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $auth = auth()->guard('api');

        if (!$auth->attempt($crendetials)) { 
            return response()->json([
                'status' => false,
                'message' => 'Login failed. Check email and password again.'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Login success',
            'user' => $auth->user(),
        ]);
    }
}
