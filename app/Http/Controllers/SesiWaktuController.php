<?php

namespace App\Http\Controllers;

use App\Models\SesiWaktu;
use Illuminate\Http\Request;

class SesiWaktuController extends Controller
{
    public function index($id)
    {
        $sesiWaktu = SesiWaktu::with(['users'])->where('id_user', '=', $id)->get();
        return response()->json(
            [
                'data' => $sesiWaktu
            ],
            200
        );
    }
    public function store(Request $request)

    {
        if (SesiWaktu::where('waktu_sesi', '=', $request->waktu_sesi)->first() && SesiWaktu::where('id_user', '=', $request->id_user)->first()) {
            return response()->json(['data' =>  SesiWaktu::create(['waktu_sesi' => $request->waktu_sesi, 'id_user' => $request->id_user])], 200);
        }else {
            return response()->json(['message' => 'Waktu sesi sudah ada']);
        }
        // return response()->json([
        //     'data' =>)
        // ]);
    }
}
