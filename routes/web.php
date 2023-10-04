<?php

use App\Http\Controllers\Admin\AboutAppController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppLanguageController;
use App\Http\Controllers\Admin\AppThemeController;
use App\Http\Controllers\Admin\AreasController;
use App\Http\Controllers\Admin\CalenderController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\OffersController;
use App\Http\Controllers\Admin\SectionsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TravelsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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
Route::middleware('auth')->group(function(){

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
Route::put('privacy/update',[SettingsController::class,'updateData'])->name('privacy.update');


Route::get('about-app/index',[AboutAppController::class,'aboutApp'])->name('aboutApp.index');
Route::get('about-app/update',[AboutAppController::class,'updateAboutApp'])->name('aboutApp.update');
Route::put('about-app/update',[AboutAppController::class,'updateData'])->name('aboutApp.update');



Route::get('faqs/index',[SettingsController::class,'faqs'])->name('faqs.index');
Route::get('faqs/create',[SettingsController::class,'createFaqs'])->name('faqs.create');
Route::post('faqs/store',[SettingsController::class,'storeFaqs'])->name('faqs.store');





Route::get('notification/create',[NotificationsController::class,'create'])->name('notification.create');


Route::resource('chat',ChatController::class);
Route::resource('languages',AppLanguageController::class);


Route::resource('theme',AppThemeController::class);


Route::get('/getevent', [CalenderController::class,'getEvent'])->name('getevent');
Route::post('/createevent',[CalenderController::class,'createEvent'])->name('createevent');
Route::post('/deleteevent',[CalenderController::class,'deleteEvent'])->name('deleteevent');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
// Route::get('/update-user/{id}', [UserController::class, 'edit'])->name('user.edit');
// Route::put('/users/{id}', [UserController::class,'update'])->name('users.update');
// Route::delete('/users/{id}', [UserController::class,'destroy'])->name('users.destroy');



});


});


// Auth

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

