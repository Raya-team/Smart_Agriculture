<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SensorController;

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
    Route::get('/user/chart', function (){
        return view('user.chart.index');
    })->name('user.chart');
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile.index');
    Route::PATCH('/user/profile/{user}', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::get('/user/sensor', [SensorController::class, 'index'])->name('user.sensor');
});



