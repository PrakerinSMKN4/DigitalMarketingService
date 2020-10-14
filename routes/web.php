<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPassController;

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


Route::post('/sendOTP',[ResetPassController::class,'sendOTP']);
Route::post('/confirmOTP',[ResetPassController::class,'validateOTP']);
Route::post('/changePass',[ResetPassController::class,'changePassword']);

Route::get('/register', function(){ return view('register'); })->middleware('guest');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register')->middleware('guest');

Route::get('/login', function () { return view('login'); })->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('redirect/{driver}',[AuthController::class,'redirectToProvider'])->name('login.provider');
Route::get('{provider}/callback',[AuthController::class, 'handleProviderCallback']);

Route::group(['middleware' => 'auth'], function(){

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/monitoring', function () {
        return view('monitoring');
    })->name('monitoring');
    
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('/setting', function () {
        return view('setting_index');
    })->name('setting');
    
    // Ntar diganti jadi id masing" menu
    Route::get('/setting/id', function () {
        return view('setting_div');
    })->name('settingDiv');

    Route::get('/connection', function () {
        return view('connection');
    })->name('connection');

    Route::get('/schedule', function () {
        return view('schedule');
    })->name('schedule');
});
