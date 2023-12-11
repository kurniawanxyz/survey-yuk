<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\SurveiController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function(){

    Route::get('/',function(){ return redirect()->route('page.login'); })->name('page.landing');
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
    Route::get('/group',function(){ return view('admin.group'); })->name('admin.group');
    Route::get('/rekap-nilai',function(){ return view('admin.rekap'); })->name('admin.rekap');

    // proses get
    Route::get("/data-survei",[SurveiController::class,'get'])->name('data.survei');
    Route::get("/data-edit-survei/{id}",[SurveiController::class,'show'])->name('data.edit-survei');
    Route::get("/data-pertanyaan/{id}",[PertanyaanController::class,'get']);
    Route::get("/data-group",[GroupController::class,'get']);
    Route::get('/data-detail-group/{id}',[GroupController::class,'show']);
    Route::get("/data-groupSurvei",[GroupController::class,'']);

    // proses create
    Route::post('/create-survei',[SurveiController::class,'create'])->name('create.survei');
    Route::post('/create-pertanyaan',[PertanyaanController::class,'create'])->name('create.pertanyaan');
    Route::post('/create-group',[GroupController::class,'create'])->name("create.group");

    // proses edit
    Route::put('/update-survei/{id}',[SurveiController::class,'edit']);
    Route::put('/update-pertanyaan/{id}',[PertanyaanController::class,'edit']);
    Route::put('/update-group/{id}',[GroupController::class,'edit']);

    // proses delete
    Route::delete('/delete-survei/{id}',[SurveiController::class,'delete']);
    Route::delete('/delete-pertanyaan/{id}',[PertanyaanController::class,'delete']);

});


Route::middleware(['auth',"role:1"])->group(function(){

    // dashboard-user
    Route::get('/dashboard-user',function(){ return view('user.dashboard'); })->name('user.dashboard');
});
