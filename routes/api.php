<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\AuthController;
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
Route::get('/user', function (Request $request) {
    return $request->user();
});
// Route::post("/articles",[ArticleController::class,'index']);
// Route::post("/articles",[ArticleController::class,'store']);
// Route::get("/articles/{id}",[ArticleController::class,'show']);
// Route::put("/articles/{id}",[ArticleController::class,'update']);
// Route::delete("/articles/{id}",[ArticleController::class,'destroy']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
Route::apiResource('articles', ArticleController::class);
Route::apiResource('categories', CategoryController::class);
