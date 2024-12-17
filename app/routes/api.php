<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\InfluencersController;
use App\Http\Controllers\CampanhasController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::group(['middleware' => ['auth:sanctum']], function() {
Route::post('login',[UserAuthController::class,'login']);
Route::group(['middleware' => ['auth:api']], function() {
    Route::post('register',[UserAuthController::class,'register']);
    Route::post('logout',[UserAuthController::class,'logout']);
        //->middleware('auth:sanctum');

    Route::get('influencers',[InfluencersController::class,'show']);
    Route::post('set-influencer',[InfluencersController::class,'store']);
        //->middleware('auth:sanctum');

    Route::get('campanhas',[CampanhasController::class,'show']);
    Route::post('set-campanha',[CampanhasController::class,'store']);
        //->middleware('auth:sanctum');

    Route::post('vincular-influencer',[InfluencersController::class,'vincularInfluencer']);
        //->middleware('auth:sanctum');

    Route::get('listar-vinculos',[InfluencersController::class,'listarVinculosByInfluencer']);
        //->middleware('auth:sanctum');
});
