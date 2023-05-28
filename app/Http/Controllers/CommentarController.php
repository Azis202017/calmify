<?php

namespace App\Http\Controllers;

use App\Models\Commentar;
use Exception;
use Illuminate\Http\Request;

class CommentarController extends Controller
{
    public function index($id)
    {
        try {
            $comment = Commentar::where('id_community', $id)->get();
            return response()->json($comment);
        } catch (Exception $e) {
        }
    }
    public function store(Request $request, $id)
    {
        try {
            $community = new Commentar();
            $file = '';
            if ($request->img_post != NULL) {
                $community->id_community = $id;
                $community->komentar = $request->komentar;
                $file = $request->img_post->store('/commentar');
                $community->img_post = $file;
                return response()->json([
                    'app_url' => env('APP_URL'),
                    "message" => "Sukses memasukkan post komunitas",
                    "img_post" => env('APP_URL') . "/storage/" .   $file,
                ], 200);
            } else {
                $community->id_community = $id;
                $community->komentar = $request->komentar;
                $community->save();

                return response()->json([
                    "message" => "Sukses memasukkan post kommentar",
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                "message" => "gagal dimasukkan",
                "error" => $e->getMessage()
            ], 502);
        }
    }
}
