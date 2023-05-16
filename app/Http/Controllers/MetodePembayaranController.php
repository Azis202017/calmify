<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\MetodePembayaran;
use Illuminate\Support\Facades\Storage;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        try {
            $data = MetodePembayaran::all();
            return response()->json(['app_url' => env('APP_URL'), 'data' => $data], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    public function store(Request $request)
    {

        try {
            $file = $request->imgUrl->store('/metode_pembayaran');
            $metodePembayaran = new MetodePembayaran();
            $metodePembayaran->imgUrl = $file;
            $metodePembayaran->namaMetode = $request->namaMetode;
            $metodePembayaran->save();

            return response()->json([
                'app_url' => env('APP_URL'),
                "message" => "Succes memasukkan metode pembayaran",
                "imgUrl" => env('APP_URL') . "/storage/" .   $file,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "gagal dimasukkan",
                "error" => $e->getMessage()
            ], 502);
        }
    }
}
