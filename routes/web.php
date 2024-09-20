<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    // return redirect('/articles');
});
Route::get('/articles/detail',function(){
    return "article detail";
 })->name('articles.detail');//route name

 //Redirect
Route::get('articles/more',function(){
    // return redirect('/articles/detail');
    // return redirect()->route('artcles.detail');
    // return redirect()->to('/articles/detail');
    // return to_route('/articles/detail');
    return redirect()->route('articles.detail.dynamic',['id'=>5]);
});

Route::get('/users/{id}',function($id){
    $user=User::find($id);
    return $user->getEmailDomain();
});

// Route::get('/articles',[ArticleController::class,'index']);
// Route::get('/detail/{id}',[ArtisanController::class,'show']);
// Route::get('/articles/create',[ArticleController::class,'create']);
Route::post('/articles/store',[ArticleController::class,'store']);
// Route::get('/articles/{id}',[ArticleController::class,'show']);
Route::delete('/articles/{id}',[ArticleController::class,'delete']);
// Route::get('/articles/{id}/edit',[ArticleController::class,'edit']);
// Route::put('/articles/{id}',[ArticleController::class,'update']);
Route::resource('articles', ArticleController::class);
Route::post('/categories/store',[CategoryController::class,'store']);
Route::delete('/categories/{id}',[CategoryController::class,'delete']);
Route::resource('categories', CategoryController::class);
Route::post('/comments/store',[CommentController::class,'store']);
Route::get('/comments/delete/{id}',[CommentController::class,'delete']);

Route::get('/home', [HomeController::class, 'index'])->name('user.dashboard');
Route::get('/admin',[DashboardController::class,'index'])->middleware(['admin'])->name('admin.dashboard');
//static route
// Route::get('/articles',function(){
//     return "article";
// });

 

//dynamic route
Route::get('/articles/detail/{id}',function($id){
    return "articles detail - $id";
})->name('articles.detail.dynamic');
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
Route::get('/emails',function(){
    return view('emails.verify');
});
 
//file download
Route::get('img_download',function(){
    return Storage::disk('public')->download('articles/1726322769.jpg');
});

