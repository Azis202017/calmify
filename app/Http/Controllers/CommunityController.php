<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Community;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        try {

            $community = Community::all();
            return response()->json(['message' => "data berhasil diambil", 'data' => $community,], 200);
        } catch (Exception $e) {
            return response()->json(['message' => "data tidak berhasil di ambil karena $e"], 500);
        }
    }
    public function store(Request $request)
    {
        try {
            $file = $request->img_post->store('/community');
            $community = new Community();
            $community->img_post = $file;
            $community->post = $request->post;
            $community->save();

            return response()->json([
                'app_url' => env('APP_URL'),
                "message" => "Sukses memasukkan post komunitas",
                "img_post" => env('APP_URL') . "/storage/" .   $file,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "gagal dimasukkan",
                "error" => $e->getMessage()
            ], 502);
        }
    }
}
