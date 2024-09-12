<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return response()->json($categories,200) ;
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
                    'name'=>'required|max:255',
                ],)
            );
        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()],200);
        }
        //store into db
        $category=new Category();
        $category->name=request()->name;
        $category->save();
        return response()->json($category,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category=Category::find($id);
        if(!$category){
            return response()->json(["message"=>"not found"],400);
        };
        return response()->json($category,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category=Category::find($id);
        if(!$category){
            return response()->json(["message"=>"not found"],400);
        };
        $validator=(
            validator(
                request()->all(),
                [
                    'name'=>'required|max:255',
                ],)
            );
        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()],200);
        }
        //store into db
        $category->name=request()->name;
        $category->save();
        return response()->json($category,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::find($id);
        if(!$category){
            return response()->json(["message"=>"not found"],400);
        };
        $category->delete();
        return response()->json(["message"=>"deleted successfully"],200);
    }
}
