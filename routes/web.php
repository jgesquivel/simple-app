<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [DashboardController::class , 'index']) ->name('dashboard');

Route::group(['prefix'=>'idea/', 'as'=>'idea.','middleware'=>['auth']],function(){

    Route::post('', [IdeaController::class , 'store'])->name('store');

    // Route::get('/{idea}', [IdeaController::class , 'show'])->name('show');

    // Route::get('/{idea}/edit', [IdeaController::class , 'edit'])->name('edit');

    // Route::put('/{idea}', [IdeaController::class , 'update'])->name('update');

    // Route::delete('/{idea}', [IdeaController::class , 'destroy'])->name('destroy');
});

Route::resource('idea', IdeaController::class)->except(['index','create','show'])->middleware('auth');

Route::resource('idea', IdeaController::class)->only(['show']);

Route::resource('users', UserController::class)->only('show','edit','update')->middleware('auth');

Route::get('profile',[UserController::class, 'profile'])->middleware('auth')->name('profile');





