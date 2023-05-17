<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
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
    public function readArticleTime() {
        $category = Category::all();

        foreach($category as $categori) {
            Str::macro('readDuration', function(...$text) {
                $totalWords = str_word_count(implode(" ", $text));
                $minutesToRead = round($totalWords / 200);

                return (int)max(1, $minutesToRead);
            });
            return response()->json([
                'data' => Str::readDuration($categori->categoryName). ' min read',
            ]);

        }

    }
}
