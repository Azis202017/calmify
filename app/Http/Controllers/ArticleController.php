<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
       $article =  Article::with(['users','category'])->get();
       return response()->json(['data' => $article]);
    }
    public function store(Request $request) {
        try {
            $file = $request->imgUrl->store('/foto_article');
            $article = new Article();
            $article->id_user = $request->id_user;
            $article->id_category = $request->id_category;
            $article->title = $request->title;
            $article->description = $request->description;

            $article->imgUrl = $file;
            $article->save();

            return response()->json([
                'app_url' => env('APP_URL'),
                "message" => "Succes menambahkan article",
                "imgUrl" => env('APP_URL') . "/storage/" .   $file,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "gagal ditambahkan",
                "error" => $e->getMessage()
            ], 502);
        }
    }
    public function update(Request $request,$id) {
        try {
            $article =  Article::find($id);

            $article->id_user = $request->id_user;
            $article->id_category = $request->id_category;
            $article->title = $request->title;
            $article->description = $request->description;

            $article->save();

            return response()->json([
                "message" => "Succes menambahkan article",
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "gagal ditambahkan",
                "error" => $e->getMessage()
            ], 502);
        }
    }

    public function getArticleUser($id) {
        $article = Article::where('id_user', $id)->get();
        return response()->json($article,200);
    }
}
