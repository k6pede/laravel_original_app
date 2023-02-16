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

Route::post('/eventAdd', [App\Http\Controllers\EventController::class ,'eventAdd'])->name('event-add');

Route::get('/apply', [App\Http\Controllers\ContactController::class ,'sendEmail'])->name('sendEmail');