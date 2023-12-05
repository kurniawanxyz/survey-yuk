<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
|| be assigned to the "web" middleware group. Make something great!

*/

Route::middleware(['guest'])->group(function(){

    Route::get('/',function(){ return view('landing-page'); })->name('page.landing');
    Route::get('/login', function () { return view('auth.login'); })->name("page.login");
    Route::get('/register', function () { return view('auth.register'); })->name("page.register");

    Route::post('/login-proses',[AuthController::class,'login'])->name('user.login');
    Route::post('/register-proses',[AuthController::class,'register'])->name('user.register');
});


Route::middleware(['auth','role:2'])->group(function () {

    // dashboard-admin
    Route::get('/dashboard-admin',function(){ return view('admin.dashboard'); })->name('admin.dashboard');

});


Route::middleware(['auth',"role:1"])->group(function(){

    // dashboard-user
    Route::get('/dashboard-user',function(){ return view('user.dashboard'); })->name('user.dashboard');
});
