<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/', [DashboardController::class,'index'])->name('dashboard');
Route::get('/idea/{idea}', [DashboardController::class,'show'])->name('idea.show');
Route::post('/idea', [DashboardController::class,'store'])->name('idea.store');
Route::get('/idea/{idea}/edit', [DashboardController::class,'edit'])->name('idea.edit');
Route::patch('/idea/{idea}', [DashboardController::class,'update'])->name('idea.update');
Route::delete('/idea/{idea}', [DashboardController::class,'delete'])->name('idea.delete');

Route::get('/terms', function (){ return view('terms');})->name('terms');

