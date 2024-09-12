<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get("/",function(){
    return "api get request";
});

Route::post("/",function(){
    return "api post request";
});
// Route::post("/articles",[ArticleController::class,'index']);
// Route::post("/articles",[ArticleController::class,'store']);
// Route::get("/articles/{id}",[ArticleController::class,'show']);
// Route::put("/articles/{id}",[ArticleController::class,'update']);
// Route::delete("/articles/{id}",[ArticleController::class,'destroy']);
Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);
