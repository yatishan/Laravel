<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
/*Route::get('/articles/more/',function(){
//     // return redirect('/articles/detail');
//     return redirect()->route('articles.detail');
// });

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/articles',[ArticleController::class,'index']);
// Route::get('/detail/{id}',[ArtisanController::class,'show']);
Route::get('/articles/create',[ArticleController::class,'create']);
Route::post('/articles/store',[ArticleController::class,'store']);
Route::get('/articles/{id}',[ArticleController::class,'show']);
Route::delete('/articles/{id}',[ArticleController::class,'delete']);
Route::get('/articles/{id}/edit',[ArticleController::class,'edit']);
Route::put('/articles/{id}',[ArticleController::class,'update']);
Route::post('/comments/store',[CommentController::class,'store']);
Route::get('/comments/delete/{id}',[CommentController::class,'delete']);

//static route
// Route::get('/articles',function(){
//     return "article";
// });

// Route::get('/articles/detail',function(){
//     return "article detail";
// })->name('articles.detail');//route name

//dynamic route
// Route::get('/articles/detail/{id}',function($id){
//     return "articles detail - $id";
// });
// Route::get('/student/{id}',function($id){
//     return "studentId- $id";
// });

//Redirect
// Route::get('/articles/more/',function(){
//     // return redirect('/articles/detail');
//     return redirect()->route('articles.detail');
// });

//Basic 
//=>resource/action/id
//resource->articles,students,users,customers,products
//action-> create,update,delete,...

//Sub route
//=>users/detail/{id}/photos
//=>articles/view/{id}/comment/add
//=>students/show/{id}/classes

//URL Query
//students?id=1&gender=female
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');