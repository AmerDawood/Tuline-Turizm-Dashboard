<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AreasController;
use App\Http\Controllers\Admin\OffersController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix(LaravelLocalization::setLocale())->group(function() {


Route::get('/',[AdminController::class,'index'])->name('dashboard.index');

Route::get('/admin/all',[AdminController::class,'allAdmins'])->name('admin.index');
Route::get('/admin/create',[AdminController::class,'createAdmin'])->name('admin.create');




Route::resource('offers',OffersController::class);
Route::resource('services',ServicesController::class);
Route::resource('users',UserController::class);
Route::resource('areas',AreasController::class);






});
