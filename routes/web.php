<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SurveiController;
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
    Route::get('/survei',function(){ return view('admin.survei'); })->name('admin.survei');
    Route::get('/pengguna',function(){ return view('admin.pengguna'); })->name('admin.pengguna');
    Route::get('/favorite',function(){ return view('admin.favorite'); })->name('admin.favorite');

    // proses get
    Route::get("/data-survei",[SurveiController::class,'get'])->name('data.survei');
    Route::get("/data-edit-survei/{id}",[SurveiController::class,'show'])->name('data.edit-survei');

    // proses create
    Route::post('/create-survei',[SurveiController::class,'create'])->name('create.survei');

    // proses edit
    Route::put('/update-survei/{id}',[SurveiController::class,'edit']);

    // proses delete
    Route::delete('/delete-survei/{id}',[SurveiController::class,'delete']);

});


Route::middleware(['auth',"role:1"])->group(function(){

    // dashboard-user
    Route::get('/dashboard-user',function(){ return view('user.dashboard'); })->name('user.dashboard');
});
