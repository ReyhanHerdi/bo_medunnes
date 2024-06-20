<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function pasienImageUpload(Request $req, int $id) {
        $pasien = Pasien::where('user_id', $id)->first();

        $req->validate([
            'image' => ['required','mimes:jpeg,png']
        ]);


        if($req->hasFile('image')) {
            $getUsername = $pasien->nama_pasien;
            $getfileExtension = $req->file('image')->getClientOriginalExtension(); // get the file extension
            $createnewFileName = time().'_'.str_replace(' ','_', $getUsername).'.'.$getfileExtension; // create new random file name
            $img_path = $req->file('image')->storeAs('public/userImage', $createnewFileName); // get the image path
            $pasien->img_pasien = $createnewFileName; // pass file name with column
            $post = $pasien->save();

            if($post && $img_path) { // save file in databse
                return response()->json([
                    'status' => true,
                    'message' => 'Upload foto berhasil',
                ]);
            }
            else {
                return response()->json([
                    'status' => false,
                    'message' => 'Upload foto gagal'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Upload foto kosong'
            ]);
        }
    }

    public function dokterImageUpload(Request $req, int $id) {
        $dokter = Dokter::where('user_id', $id)->first();

        $req->validate([
            'image' => ['required', 'mimes:jpeg,png']
        ]);

        if($req->hasFile('image')) {
            try {
                $getUsername = $dokter->nama_dokter;
                $getfileExtension = $req->file('image')->getClientOriginalExtension(); // get the file extension
                $createnewFileName = time().'_'.str_replace(' ','_', $getUsername).'.'.$getfileExtension; // create new random file name
                $img_path = $req->file('image')->storeAs('public/userImage', $createnewFileName); // get the image path
                $dokter->img_dokter = $createnewFileName; // pass file name with column
                $post = $dokter->save();

                if($post && $img_path) { // save file in databse
                    return response()->json([
                        'status' => true,
                        'message' => 'Upload foto berhasil',
                    ]);
                }
                else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Upload foto gagal'
                    ]);
                }
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => $th,
                ]);
            }
            
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Upload foto kosong'
            ]);
        }
    }
}
