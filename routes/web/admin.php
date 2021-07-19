<?php

use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FilterController;
use App\Http\Controllers\Admin\LandController;
use App\Http\Controllers\Admin\LandHeatController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Admin\SensorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

Route::get('/', function () {
//    if (Auth::user()->level == 1 || Auth::user()->level == 2){
//        return 'level is 1';
//    }
//    auth()->loginUsingId(1);
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' =>['auth', 'auth.admin']] , function (){

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/users' , UserController::class);
    Route::get('/user-verify',[UserController::class,'verify'])->name('users.verify');
    Route::put('/user-verified/{user}',[UserController::class,'verified'])->name('users.verified');
    Route::resource('/lands' , LandController::class);
    Route::get('/lands/heat/{land}' ,[LandHeatController::class,'index'])->name('lands.heat');
    Route::resource('/sensors',SensorController::class);
    Route::resource('filters',FilterController::class);
    Route::resource('/roles',RoleController::class);
    Route::resource('/users-role',RoleUserController::class, ['parameters' => ['users-role' => 'user']]);
    Route::get('/admin/profile',[ProfileController::class,'index'])->name('admin.profile.index');
    Route::PATCH('/admin/profile/{user}',[ProfileController::class,'update'])->name('admin.profile.update');
    Route::resource('/chart',ChartController::class, ['parameters' => ['chart' => 'sensor']]);
});
Route::post('/user_register',[RegisterController::class, 'store'])->name('user.register');
Route::get('/migrate', function (){
    return \Illuminate\Support\Facades\Artisan::call('migrate');
});