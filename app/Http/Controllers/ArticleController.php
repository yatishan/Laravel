<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->except(['index','show']);
    }
    public function index(){
        $articles=Article::latest()->paginate(2);
        $fot='some';
    //     return view('article.index',[
    //         'articles'=>$articles,
    //         'fot'=>$fot
    // ]);
    // return view('article.index')
    //        ->with('articles',$articles)
    //        ->with('fot',$fot);
    return view('articles.index',compact('articles','fot'));
    }
    public function show($id){
        // $articles=Article::latest()->paginate(2);
        $article=Article::find($id);
        // dd($article->comments);
        // dd($article->tags);
        return view('articles.show',compact('article'));
    }
    public function create(){
        $categories=Category::all();
        return view('articles.create',compact('categories'));
    }
    public function store(){
        $validator=(
            validator(
                request()->all(),
                [
                    'title'=>'required',
                    'body'=>'required',
                    'category_id'=>'required',
                    'image'=>'image|mimes:jpg,jpeg,png|max:1024',
                ],)
            );
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        //store into db
        $article=new Article();
        $article->title=request()->title;
        $article->body=request()->body;
        $article->category_id=request()->category_id;

        if(request()->hasFile('image')){
            $file=request()->file('image');
            $file_name=time().".".$file->getClientOriginalExtension();
            $file->storeAs('articles',$file_name,'public');
            $article->image=$file_name;
        }

        $article->save();

        return redirect('articles')->with('info','Article create successfully');
    }
    public function edit($id){
        $article=Article::find($id);
        $categories=Category::all();
        return view(
            'articles.edit',
            compact('article','categories'),
        );
    }
    public function update($id){
        $validator=(
            validator(
                request()->all(),
                [
                    'title'=>'required',
                    'body'=>'required',
                    'category_id'=>'required',
                    'image'=>'image|mimes:jpg,jpeg,png|max:1024',
                ],)
            );
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        //store into db
        $article=Article::find($id);
        $article->title=request()->title;
        $article->body=request()->body;
        $article->category_id=request()->category_id;
        if(request()->hasFile('image')){
            $file=request()->file('image');
            $file_name=time().".".$file->getClientOriginalExtension();
            $file->storeAs('articles',$file_name,'public');
            $article->image=$file_name;
        }
        $article->save();

        return redirect('articles')->with('info','Article create successfully');
    }
    public function delete($id){
        $article=Article::find($id);
        $article->delete();
        return redirect('articles')->with('info','An article has been deleted!');
    }
}
