<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('idea',DashboardController::class)->only('show');
Route::resource('idea',DashboardController::class)->except('index','create','show')->middleware('auth');
//Route::resource('idea.comment',CommentController::class)->only('store')->middleware('auth');
Route::post('idea/{idea}/comment',[CommentController::class,'store'])->name('idea.comment.store')->middleware('auth');
Route::resource('user',UserController::class)->only('show','edit','update')->middleware('auth');
Route::get('profile',[UserController::class,'profile'])->middleware('auth')->name('profile');

Route::get('/terms', fn() => view('terms'))->name('terms');




