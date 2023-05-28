<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use Exception;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = pemesanan::with(['user', 'waktu_sesi', 'metode_pembayaran'])->get();
        return response()->json([
            'message' => 'invoice',
            'data' => $pemesanan,


        ], 200);
    }
    public function store(Request $request)
    {
        try {
            $data =    pemesanan::create(['id_user' => $request->id_user, 'id_metode_pembayaran' => $request->id_metode_pembayaran, 'no_telepon' => $request->no_telepon, 'tanggal_lahir' => $request->tanggal_lahir,'alamat' => $request->alamat, 'tanggal_sesi' => $request->tanggal_sesi, 'id_waktu_sesi' => $request->id_waktu_sesi, 'durasi' => $request->durasi, 'no_telepon' => $request->no_telepon]);
         ;
            return response()->json([
               'message' => 'success memesan psikolog',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
