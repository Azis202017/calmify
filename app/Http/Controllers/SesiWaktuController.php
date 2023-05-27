<?php

namespace App\Http\Controllers;

use App\Models\SesiWaktu;
use Illuminate\Http\Request;

class SesiWaktuController extends Controller
{
    public function index() {
        $sesiWaktu = SesiWaktu::with(['users'])->get();
        return response()->json(
            [
                'data' => $sesiWaktu
            ], 200
        );
    }
}
