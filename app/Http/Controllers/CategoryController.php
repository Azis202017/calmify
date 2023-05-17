<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return response()->json(['data' => $category, 'message' => 'Get data category success']);
    }
    public function store(Request $request) {
        $category = Category::create($request->all());
        return response()->json(['data' => $category, 'message' => 'Add data category success']);
    }
}
