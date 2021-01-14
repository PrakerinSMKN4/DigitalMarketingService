<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientWebController;
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
    
    //Route untuk List User
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin-user');
    Route::get('/admin/invoice/', [InvoiceController::class, 'indexAdmin'])->name('admin-invoice');
    Route::get('/admin/invoice/{id}', [InvoiceController::class, 'showAdmin'])->name('admin-invoice-detail');

    //Route untuk produk
    Route::get('/product/{user:id}', [ProdukController::class, 'indexAdmin'])->name('product');
    Route::post('/product',[ProdukController::class, 'store'])->name('product_store');
    Route::get('/product/edit/{product:id}',[ProdukController::class, 'edit'])->name('product_edit');
    Route::patch('/product/edit/{product:id}', [ProdukController::class, 'update'])->name('product_update');
    Route::delete('product/destroy/{id}', [ProdukController::class, 'destroy'])->name('product_destroy');

    //Route untuk Schedule
    Route::get('/schedule/{user:id}', [ScheduleController::class, 'indexAdmin'])->name('schedule');

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
    Route::post('/update/website', [UserController::class, 'updateWebsite'])->name('update-website');

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


    Route::get('/website/list-service', [WebsiteController::class, 'showListService'])->name('/list-service');
    Route::post('/website/list-service', [WebsiteController::class, 'storeService'])->name('/list-service-store');
    Route::delete('/website/list-service-delete/{id}', [WebsiteController::class, 'destroyService'])->name('/list-service-delete');
    Route::get('/website/list-service-edit/{id}', [WebsiteController::class, 'editService'])->name('/list-service-edit');
    Route::patch('/website/list-service-edit/{id}', [WebsiteController::class, 'updateService'])->name('/list-service-update');

    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice');
});
Route::get('/getCalendarData/{id}',[ScheduleController::class,'getData']);

Route::post('/getDashboardData',[DashboardController::class, 'getDashboardData']);

Route::get('/verifikasi/{id}/{token}', [VerifikasiController::class, 'verifikasiEmail']);

// Client Web
Route::get('/client/home', [ClientWebController::class, 'home'])->name('/client/home');
Route::get('/client/service', [ClientWebController::class, 'service'])->name('/client/service');
Route::get('/client/about', [ClientWebController::class, 'about'])->name('/client/about');