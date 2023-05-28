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
        $checkSesiExists = SesiWaktu::where('waktu_sesi', '=', $request->waktu_sesi)->first() && SesiWaktu::where('id_user', '=', $request->id_user)->first();
        if ($checkSesiExists) {
            return response()->json(['message' => 'Waktu sesi sudah ada'], 500);
        } else {
            return response()->json(['data' =>  SesiWaktu::create(['waktu_sesi' => $request->waktu_sesi, 'id_user' => $request->id_user])], 200);
        }
        // return response()->json([
        //     'data' =>)
        // ]);
    }
}
