<?php

use App\Http\Controllers\API\AreasController;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\LanguageController;
use App\Http\Controllers\API\SectionsController;
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


Route::get('/home',[HomeController::class,'home']);
Route::get('/areas',[AreasController::class,'areas']);
Route::get('/sections',[SectionsController::class,'sections']);
Route::get('/languages',[LanguageController::class,'index']);



// Auth



Route::post('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'register']);

Route::get('getUserData',[AuthController::class,'getUserData'])->middleware('auth:sanctum','api');
Route::put('updateUserData',[AuthController::class,'updateUserData'])->middleware('auth:sanctum','api');


