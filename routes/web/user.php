<?php

use App\Http\Controllers\User\ChartController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\LandController;

//use App\Http\Controllers\HomeController;

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

//Route::get('/', function () {
////    auth()->loginUsingId(1);
////    return view('welcome');
////});

Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'auth.user']] , function (){
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile.index');
    Route::PATCH('/user/profile/{user}', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::get('/user/lands', [LandController::class, 'index'])->name('user.lands');
    Route::get('/user/show/{land}', [LandController::class, 'show'])->name('user.land.show');
    Route::get('/user/heat/{land}', [LandController::class, 'heat'])->name('user.land.heat');
    Route::resource('/chart-user',ChartController::class, ['parameters' => ['chart' => 'sensor']]);
});



