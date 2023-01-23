<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('posts', PostController::class);
Route::get("/karyawan", [PostController::class, 'index']);
Route::post("/karyawan", [PostController::class, 'create']);
Route::put('/karyawan/{id}', [PostController::class, 'update']);
Route::delete('/karyawan/{id}', [PostController::class, 'delete']);
Route::get('/karyawan/{id}', [PostController::class, 'getById']);

// Route::group(['prefix' => "/karyawan"]){
//     Route::get("/",[PostController::class,'index']);
//     Route::post("/",[PostController::class,'create']);
//     Route::put("/{id}",[PostController::class,'update']);
//     Route::delete("/{id}",[PostController::class,'delete']);
// }
