<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaLikeController;
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

Route::get('lang/{lang}',function ($lang){
    session()->put('locale',$lang);
    return redirect()->back();
})->name('lang');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('idea',DashboardController::class)->only('show');
Route::resource('idea',DashboardController::class)->except('index','create','show')->middleware('auth');
//Route::resource('idea.comment',CommentController::class)->only('store')->middleware('auth');
Route::post('idea/{idea}/comment',[CommentController::class,'store'])->name('idea.comment.store')->middleware('auth');
Route::resource('user',UserController::class)->only('show');
Route::resource('user',UserController::class)->only('edit','update')->middleware('auth');
Route::get('profile',[UserController::class,'profile'])->middleware('auth')->name('profile');
Route::post('users/{user}/follow',[FollowerController::class,'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow',[FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');

Route::get('/terms', fn() => view('terms'))->name('terms');

Route::post('ideas/{idea}/like',[IdeaLikeController::class,'like'])->middleware('auth')->name('ideas.like');
Route::post('ideas/{idea}/unlike',[IdeaLikeController::class,'unlike'])->middleware('auth')->name('ideas.unlike');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

Route::middleware(['auth','admin'])->prefix('admin')->as('admin.')->group(function (){
    Route::get('/dashboard', [AdminDashboardController::class,'index'])->name('dashboard');
    Route::resource('user',AdminUserController::class)->only('index');
    Route::resource('ideas',AdminIdeaController::class)->only('index');

});





