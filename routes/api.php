<?php

use App\Http\Controllers\Admin\AboutAppController;
use App\Http\Controllers\API\AreasController;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\FavoriteController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\LanguageController;
use App\Http\Controllers\API\SectionsController;
use App\Http\Controllers\API\ServicesController;
use App\Http\Controllers\API\SettingsController;
use App\Http\Controllers\API\UserPlaceController;
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


// Route for authenticated access
Route::middleware(['auth:sanctum', 'api'])->group(function () {
    Route::get('/services', [ServicesController::class, 'services']);
    Route::get('/favorite-services', [FavoriteController::class, 'getFavoriteServices']);
    Route::post('/services/{service}/add-to-favorites', [FavoriteController::class, 'storeServicesToFavorite']);
    Route::delete('/services/{service}/remove-from-favoritess', [FavoriteController::class, 'removeFromFavorites']);

    Route::get('user-places',[UserPlaceController::class,'index']);
    Route::post('user-places/store',[UserPlaceController::class,'store']);
    Route::delete('user-places/destroy/{userPlace}',[UserPlaceController::class,'destroy']);


});

Route::get('/notLoggedInService', [ServicesController::class, 'notLoggedInService']);


// Auth

Route::get('privacy',[SettingsController::class,'privacy']);
Route::get('faqs',[SettingsController::class,'faqs']);
Route::get('aboutApp',[SettingsController::class,'aboutApp']);




Route::post('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'register']);

Route::get('getUserData',[AuthController::class,'getUserData'])->middleware('auth:sanctum','api');

Route::put('updateUserData',[AuthController::class,'updateUserData'])->middleware('auth:sanctum','api');


