<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PsikologController extends Controller
{
    public function index() {
        $psikolog = User::where('role','=','psikolog')->get();
        return response()->json($psikolog,200);
    }
}
