<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

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

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/register', function () {
    return view('pages.register');
});

Route::get('/index/account', function () {
    return view('admins.index_account');
});

Route::get('/layout', function () {
    return view('layouts.layout02');
});
Route::get('/edit', function () {
    return view('admins.edit_account');
});
Route::get('/index-acc', [AdminController::class, 'index'])->name('admin-acc.index');

//bắt buộc đăng nhập
Route::middleware('auth')->group(function(){
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::prefix('admin')->middleware('can:role')->group(function () {
        Route::get('/', [AdminController::class, 'show'])->name('admin.index');
        Route::get('/index-acc', [AdminController::class, 'index'])->name('admin.acc.index');
    });

});
Route::get('textmail',[HomeController::class, 'Textmail'])->name('mail');
Route::get('textmail',[HomeController::class, 'Textmail'])->name('mail');

Route::get('/login', [LoginController::class, 'show'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.index');

Route::get('/register', [LoginController::class, 'showregister'])->name('register.index');


Route::get('/register/verify', [LoginController::class, 'showverify'])->name('register.verify');
Route::post('/register', [LoginController::class, 'register'])->name('register.submit');
Route::post('/register/verify', [LoginController::class, 'verifyToken'])->name('verify.submit');

/*
Route::group(['prefix' => ''], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
});
Route::get('/login', function () {
    return view('admins.register');
});
*/









