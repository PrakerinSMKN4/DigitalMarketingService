<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('dashboard');
})->name('dashboard');

Route::get('/register', function(){
    return view('register');
})->middleware('guest');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register')->middleware('guest');
Route::get('/login', function () {
    return view('login');
})->middleware('guest');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('redirect/{driver}',[AuthController::class,'redirectToProvider'])->name('login.provider');
Route::get('{provider}/callback',[AuthController::class, 'handleProviderCallback']);

Route::group(['middleware' => 'auth'], function(){
   Route::get('/profile', function(){
        return view('profile');
    }); 
    Route::get('/home', function(){
        return view('home');
    });     
    Route::get('/about', function () {
        return view('about');
    });
});
