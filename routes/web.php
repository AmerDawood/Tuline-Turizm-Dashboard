<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppLanguageController;
use App\Http\Controllers\Admin\AppThemeController;
use App\Http\Controllers\Admin\AreasController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\OffersController;
use App\Http\Controllers\Admin\SectionsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TravelsController;
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


Route::prefix(LaravelLocalization::setLocale())->group(function() {


Route::get('/',[AdminController::class,'index'])->name('dashboard.index');

Route::get('/admin/all',[AdminController::class,'allAdmins'])->name('admin.all');
Route::get('/admin/create',[AdminController::class,'createAdmin'])->name('admin.create');




Route::resource('offers',OffersController::class);
Route::resource('services',ServicesController::class);
Route::resource('users',UserController::class);
Route::resource('areas',AreasController::class);


Route::resource('sliders',SliderController::class);
Route::resource('sections',SectionsController::class);
Route::resource('travels',TravelsController::class);
Route::get('privacy/index',[SettingsController::class,'privacy'])->name('privacy.index');
Route::get('privacy/update',[SettingsController::class,'updatePrivacy'])->name('privacy.update');


Route::get('faqs/index',[SettingsController::class,'faqs'])->name('faqs.index');
Route::get('faqs/create',[SettingsController::class,'createFaqs'])->name('faqs.create');




Route::get('notification/create',[NotificationsController::class,'create'])->name('notification.create');


Route::resource('chat',ChatController::class);
Route::resource('languages',AppLanguageController::class);


Route::resource('theme',AppThemeController::class);





});
