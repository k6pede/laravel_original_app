<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
//一般ユーザー用のlogin registerとadmin用login registerを整理
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'showAdminRegisterForm']);

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin']);
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'registerAdmin'])->name('admin-register');

Route::view('/admin', 'admin')->middleware('auth:admin')->name('admin-home');




Route::get('/', [App\Http\Controllers\TopController::class, 'top'])->name('top');


Route::post('/calcCalendar', [App\Http\Controllers\CalendarController::class, 'calcCalendar'])->name('calcCalendar');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/show', [App\Http\Controllers\ShowController::class, 'show'])->name('show');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');

Route::post('/createUsersEvent', [App\Http\Controllers\EventController::class ,'createUsersEvent'])->name('createusersevent');
Route::post('/addEventFromCharactersInfo', [App\Http\Controllers\EventController::class ,'addEventFromCharactersInfo'])->name('addevent');
Route::put('/editEvent', [App\Http\Controllers\EventController::class ,'editEvent'])->name('editevent');
Route::get('/deleteEvent', [App\Http\Controllers\EventController::class ,'deleteEvent'])->name('deleteevent');


//contactフォームから新規登録メールを送信
Route::get('/contact', [App\Http\Controllers\ContactController::class ,'contact'])->name('contact');
Route::post('/contact/confirm', [App\Http\Controllers\ContactController::class ,'confirm'])->name('confirm');
Route::post('/apply', [App\Http\Controllers\ContactController::class ,'sendEmail'])->name('sendEmail');

//modifyフォームから修正依頼メールを送信
Route::get('/modify', [App\Http\Controllers\ContactController::class ,'modify'])->name('modify');
Route::post('/modify/confirm', [App\Http\Controllers\ContactController::class ,'confirmModify'])->name('confirmModify');
Route::post('/applyModify', [App\Http\Controllers\ContactController::class ,'sendModifyEmail'])->name('sendModifyEmail');
Route::get('/thanks', [App\Http\Controllers\ContactController::class ,'thanks']);

//開発用
Route::group(['middleware' => ['auth', 'admin']], function () {
  // 管理者用のルート
});
Route::get('/create/character', [App\Http\Controllers\CharacterController::class ,'create'])->name('create');
Route::post('/store/character', [App\Http\Controllers\CharacterController::class ,'store'])->name('store');
Route::get('/show/character', [App\Http\Controllers\CharacterController::class, 'show']);
Route::post('/edit/character', [App\Http\Controllers\CharacterController::class, 'edit']);
Route::post('/update/character', [App\Http\Controllers\CharacterController::class, 'update']);
Route::post('/destroy/character', [App\Http\Controllers\CharacterController::class, 'destroy']);


//S3アップロードテスト
Route::view('upload', 'uploadpics');
Route::post('s3', [\App\Http\Controllers\S3Controller::class, 'uploadS3'])->name('s3');

//profile.bladeテスト用
Route::view('profile','components.modals.profile');