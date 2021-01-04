<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ResetPassController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;

use function Ramsey\Uuid\v1;

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

//Reset password route
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


//After login
Route::group(['middleware' => 'auth'], function(){

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/monitoring', function () {
        return view('monitoring');
    })->name('monitoring');
    
    Route::get('/connection', function () {
        return view('connection');
    })->name('connection');

  /*  Route::get('/schedule', function () {
        return view('schedule');
    })->name('schedule');   */

   //Route untuk Menu pages 
//    Route::get('/setting', function() {
//        return  view('setting_index'. )
//    })
//    Route::get('/setting', [MenuController::class, 'index'])->name('menu');
    //Route::get('/setting/create',[MenuController::class, 'create'])->name('menu_store');
    //Route::post('/setting/store', [MenuController::class, 'store']);

    //Route untuk List User
    Route::get('/user', [UserController::class, 'index'])->name('user');

    //Route untuk produk
    Route::get('/product/{user:id}', [ProdukController::class, 'index'])->name('product');
    Route::post('/product',[ProdukController::class, 'store'])->name('product_store');
    Route::get('/product/edit/{product:id}',[ProdukController::class, 'edit'])->name('product_edit');
    Route::patch('/product/edit/{product:id}', [ProdukController::class, 'update'])->name('product_update');
    Route::delete('product/destroy/{id}', [ProdukController::class, 'destroy'])->name('product_destroy');

    //Route untuk Schedule
    Route::get('/schedule/{user:id}', [ScheduleController::class, 'index'])->name('schedule');

    //Route untuk Item pages
    Route::get('/setting/id/{menupage:id}',[ItemController::class, 'index'])->name('item_pages');
    Route::get('/content', [ItemController::class, 'create'])->name('content');
    Route::post('/content/store', [ItemController::class, 'store'])->name('content_store');
    Route::patch('/setting/edit/{itempage:id}',[ItemController::class, 'update'])->name('item_pages_edit');
    Route::get('/setting/edit/{itempage:id}', [ItemController::class, 'edit']);
    Route::delete('/setting/destroy/{id}', [ItemController::class, 'destroy']);

    //Route untuk company profile
    Route::get('/profile', [CompanyController::class, 'create'])->name('profile_index');
    Route::get('/profile/{user:id}', [CompanyController::class, 'index'])->name('profile');
    Route::post('/profile/store', [CompanyController::class, 'store']);
    Route::get('/profile/edit', [CompanyController::class, 'edit'])->name('profile_edit');
    Route::patch('/profile/edit/{Company:id}', [CompanyController::class, 'update'])->name('profile_update');
   
});
