<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ResetPassController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\WebsiteController;

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

//Super Admin Routes

//Reset password route
Route::post('/sendOTP',[ResetPassController::class,'sendOTP']);
Route::post('/confirmOTP',[ResetPassController::class,'validateOTP']);
Route::post('/changePass',[ResetPassController::class,'changePassword']);

Route::get('/admin/register', function(){ return view('admin.register'); })->middleware('guest');
Route::post('/admin/register', [AuthController::class, 'postRegisterAdmin'])->name('admin-register')->middleware('guest');

Route::get('/admin/login', function () { return view('admin.login'); })->name('admin-login')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'postLoginAdmin'])->name('admin-login')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('admin-logout');
// Route::get('redirect/{driver}',[AuthController::class,'redirectToProvider'])->name('login.provider');
// Route::get('{provider}/callback',[AuthController::class, 'handleProviderCallback']);


//Admin Client Routes
Route::get('/home', function () {
    return view('landingPage');
})->name('/');

Route::get('/', function () {
    return view('landingPage');
});

Route::get('/contact', function () {
    return view('contact');
})->name('/contact');

Route::get('/service', function () {
    return view('service');
})->name('/service');

Route::get('/about', function () {
    return view('about');
})->name('/about');

Route::get('/register', [AuthController::class, 'getRegister'])->name('/register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');

Route::get('/login', [AuthController::class, 'getLogin'])->name('/login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Client Dashboard

//After login
Route::group(['middleware' => 'auth'], function(){

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin-dashboard');
    
    // Route::get('/monitoring', function () {
    //     return view('monitoring');
    // })->name('monitoring');
    
    // Route::get('/connection', function () {
    //     return view('connection');
    // })->name('connection');
    
    //Route untuk List User
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin-user');

    //Route untuk produk
    Route::get('/product/{user:id}', [ProdukController::class, 'indexAdmin'])->name('product');
    Route::post('/product',[ProdukController::class, 'store'])->name('product_store');
    Route::get('/product/edit/{product:id}',[ProdukController::class, 'edit'])->name('product_edit');
    Route::patch('/product/edit/{product:id}', [ProdukController::class, 'update'])->name('product_update');
    Route::delete('product/destroy/{id}', [ProdukController::class, 'destroy'])->name('product_destroy');

    //Route untuk Schedule
    Route::get('/schedule/{user:id}', [ScheduleController::class, 'indexAdmin'])->name('schedule');

    //Route untuk Item pages
    // Route::get('/setting/id/{menupage:id}',[ItemController::class, 'index'])->name('item_pages');
    Route::get('/content', [ItemController::class, 'create'])->name('content');
    Route::post('/content/store', [ItemController::class, 'store'])->name('content_store');
    // Route::patch('/setting/edit/{itempage:id}',[ItemController::class, 'update'])->name('item_pages_edit');
    // Route::get('/setting/edit/{itempage:id}', [ItemController::class, 'edit']);
    // Route::delete('/setting/destroy/{id}', [ItemController::class, 'destroy']);

    //Route untuk company profile
    Route::get('/profile', [CompanyController::class, 'create'])->name('profile_index');
    Route::get('/profile/{user:id}', [CompanyController::class, 'indexAdmin'])->name('profile');
    Route::post('/profile/store', [CompanyController::class, 'store']);
    Route::get('/profile/edit', [CompanyController::class, 'edit'])->name('profile_edit');
    Route::patch('/profile/edit/{Company:id}', [CompanyController::class, 'update'])->name('profile_update');
    
    Route::post('/schedule/create', [ScheduleController::class, 'store']);
    Route::get('/schedule/edit/{id}', [ScheduleController::class, 'edit'])->name('/admin/schedule/edit');
    Route::patch('/schedule/edit', [ScheduleController::class, 'update']);
    Route::delete('/schedule/delete', [ScheduleController::class, 'destroy']);
    
    Route::get('/admin/permohonan', [PembayaranController::class, 'index'])->name('admin-permohonan');
    Route::post('/admin/verifikasi', [PembayaranController::class, 'verifikasi'])->name('verifikasi');

    //Routes Admin Client
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('/dashboard');
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('/schedule');
    Route::post('/konfirmasi-beli-paket', [PaketController::class, 'store']);

    Route::get('/detail-schedule/{id}', [ScheduleController::class, 'show']);
    
    Route::post('/update/socmed', [UserController::class, 'updateSocmed'])->name('update-socmed');

    Route::get('/plan', function () {
        return view('dashboard.buy_plan');
    })->name('/plan');
   
    Route::get('/company-profile', [CompanyController::class, 'index']);
    Route::post('/company-profile', [CompanyController::class, 'store'])->name('/company-profile-store');

    //Route untuk Website Produk
    Route::get('/website', [WebsiteController::class, 'index'])->name('/website');
    Route::get('/website/list-product',[WebsiteController::class,'showListProduct'])->name('/list-product');
    Route::post('/website/list-product', [WebsiteController::class, 'store'])->name('/list-product-store');
    Route::delete('/website/list-product-delete/{id}', [WebsiteController::class, 'destroy'])->name('/list-product-delete');
    Route::get('/website/list-product-edit/{id}', [WebsiteController::class, 'edit'])->name('/list-product-edit');
    Route::patch('/website/list-product-edit/{id}', [WebsiteController::class, 'update'])->name('/list-product-update');

    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice');
});
Route::get('/getCalendarData/{id}',[ScheduleController::class,'getData']);

Route::post('/getDashboardData',[DashboardController::class, 'getDashboardData']);

Route::get('/verifikasi/{id}/{token}', [VerifikasiController::class, 'verifikasiEmail']);
