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

Route::get('/', [App\Http\Controllers\TopController::class, 'top'])->name('top');

Route::get('/calendar', [App\Http\Controllers\CalendarController::class, 'getCalendarDates'])->name('getCalendarDates');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/show', [App\Http\Controllers\ShowController::class, 'show'])->name('show');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');


//Autocomplete
// Route::get('/autocomplete', [App\Http\Controllers\AutoCompleteController::class, 'autocomplete'])->name('autocomplete');
Route::get('/addEvent', [App\Http\Controllers\EventController::class ,'addEvent'])->name('addevent');
Route::get('/editEvent', [App\Http\Controllers\EventController::class ,'editEvent'])->name('editevent');
Route::get('/deleteEvent', [App\Http\Controllers\EventController::class ,'deleteEvent'])->name('deleteevent');


//contactフォームから新規登録メールを送信
Route::get('/contact', [App\Http\Controllers\ContactController::class ,'contact'])->name('contact');
Route::post('/contact/confirm', [App\Http\Controllers\ContactController::class ,'confirm'])->name('contact.confirm');
Route::post('/apply', [App\Http\Controllers\ContactController::class ,'sendEmail'])->name('sendEmail');

//modifyフォームから修正依頼メールを送信
Route::get('/modify', [App\Http\Controllers\ContactController::class ,'modify'])->name('modify');
Route::post('/modify/confirm', [App\Http\Controllers\ContactController::class ,'confirmModify'])->name('confirmModify');
Route::post('/applyModify', [App\Http\Controllers\ContactController::class ,'sendModifyEmail'])->name('sendModifyEmail');
Route::get('/thanks', [App\Http\Controllers\ContactController::class ,'thanks']);

//開発用
Route::get('/create/character', [App\Http\Controllers\CharacterController::class ,'create'])->name('create');
Route::post('/store/character', [App\Http\Controllers\CharacterController::class ,'store'])->name('store');
Route::get('/show/character', [App\Http\Controllers\CharacterController::class, 'show']);
Route::post('/edit/character', [App\Http\Controllers\CharacterController::class, 'edit']);
Route::post('/update/character', [App\Http\Controllers\CharacterController::class, 'update']);
Route::post('/destroy/character', [App\Http\Controllers\CharacterController::class, 'destroy']);