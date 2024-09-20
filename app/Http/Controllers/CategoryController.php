<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->except(['index','show']);
    }
    public function index(){
        $categories=Category::all();
    //     return view('article.index',[
    //         'articles'=>$articles,
    //         'fot'=>$fot
    // ]);
    // return view('article.index')
    //        ->with('articles',$articles)
    //        ->with('fot',$fot);
    return view('categories.index',compact('categories'));
    }
    public function show($id){
        // $articles=Article::latest()->paginate(2);
        $category=Category::find($id);
        // dd($article->comments);
        return view('categories.show',compact('category'));
    }
    public function create(){
        return view('categories.create');
    }
    public function store(){
        $validator=(
            validator(
                request()->all(),
                [
                    'name'=>'required | max:255',
                ],)
            );
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        //store into db
        $category=new Category();
        $category->name=request()->name;
        $category->save();

        return redirect('categories')->with('info','Category create successfully');
    }
    public function edit($id){
        $category=Category::find($id);
        return view(
            'categories.edit',compact('category')
        );
    }
    public function update($id){
        $validator=(
            validator(
                request()->all(),
                [
                    'name'=>'required',
                ],)
            );
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        //store into db
        $category=Category::find($id);
        $category->name=request()->name;
        $category->save();

        return redirect('categories')->with('info','Category update successfully');
    }
    public function delete($id){
        $category=Category::find($id);
        $category->delete();
        return redirect('categories')->with('info','An Category has been deleted!');
    }
}
