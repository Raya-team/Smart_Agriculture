<?php
//
//use App\Http\Controllers\Admin\DashboardController;
//use App\Http\Controllers\Admin\UserController;
//use App\Http\Controllers\HomeController;
//use Illuminate\Support\Facades\Route;
//
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes();
//
//Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::group(['middleware' => 'auth'] , function (){
//    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//    Route::resource('/users' , UserController::class);
//    Route::get('/chart', function (){
//        return view('admin.chart.index');
//    })->name('chart');
//});
//
//
//
////Route::get('/', function () {
//////    return view('welcome');
//////    return User::factory()->make([
//////        'name' => 'Ehsan Roozbakhsh'
//////    ]);