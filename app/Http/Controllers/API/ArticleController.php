<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::all();
        return response()->json($articles,200) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return request()->all();
        $validator=(
            validator(
                request()->all(),
                [
                    'title'=>'required|max:255',
                    'body'=>'required',
                    'category_id'=>'required',
                ],)
            );
        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()],200);
        }
        //store into db
        $article=new Article();
        $article->title=request()->title;
        $article->body=request()->body;
        $article->category_id=request()->category_id;
        $article->save();
        return response()->json($article,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article=Article::find($id);
        if(!$article){
            return response()->json(["message"=>"not found"],400);
        };
        return response()->json($article,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article=Article::find($id);
        if(!$article){
            return response()->json(["message"=>"not found"],400);
        };
        $validator=(
            validator(
                request()->all(),
                [
                    'title'=>'required|max:255',
                    'body'=>'required',
                    'category_id'=>'required',
                ],)
            );
        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()],200);
        }
        //store into db
        $article->title=request()->title;
        $article->body=request()->body;
        $article->category_id=request()->category_id;
        $article->save();
        return response()->json($article,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article=Article::find($id);
        if(!$article){
            return response()->json(["message"=>"not found"],400);
        };
        $article->delete();
        return response()->json(["message"=>"deleted successfully"],200);
    }
}
