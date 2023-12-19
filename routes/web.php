<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PengerjaanController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\PenggunaController;
use App\Models\Pengerjaan;
use App\Models\Survei;
use Illuminate\Support\Facades\Auth;
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
    Route::get('/forgot-password', function (){return view('auth.forgot-password');})->name("show-form-forgot-password");
    Route::post('/forgot-password', [AuthController::class, 'forgotPasswordMail'])->name('forgot-password');
    Route::get('/forgot-password/{token}/{email}', [AuthController::class, 'forgotPasswordResetView'])->name('forgot-password-mail');
    Route::post('/forgot-password-reset', [AuthController::class, 'forgotPasswordReset'])->name('forgot-password-reset');

    Route::post('/login-proses',[AuthController::class,'login'])->name('user.login');
    Route::post('/register-proses',[AuthController::class,'register'])->name('user.register');
});

Route::post('/logout',[AuthController::class,'logout'])->name('user.logout');

Route::middleware(['auth','role:2'])->group(function () {

    // dashboard-surveyor
    Route::get('/dashboard-surveyor',function(){ return view('admin.dashboard'); })->name('admin.dashboard');
    Route::get('/survei',function(){ return view('admin.survei'); })->name('admin.survei');
    Route::get('/pengguna',function(){ if(Auth::user()->permission == 0){ return abort(404); } return view('admin.pengguna'); })->name('admin.pengguna');
    Route::get('/favorite',function(){ return view('admin.favorite'); })->name('admin.favorite');
    Route::get('/group',function(){ return view('admin.group'); })->name('admin.group');
    Route::get('/rekap-nilai',function(){ return view('admin.rekap'); })->name('admin.rekap');

    // proses get
    Route::get("/data-survei",[SurveiController::class,'get'])->name('data.survei');
    Route::get("/data-edit-survei/{id}",[SurveiController::class,'show'])->name('data.edit-survei');
    Route::get("/data-pertanyaan/{id}",[PertanyaanController::class,'get']);
    Route::get("/data-group",[GroupController::class,'get']);
    Route::get('/data-detail-group/{id}',[GroupController::class,'show']);
    Route::get("/data-groupSurvei",[GroupController::class,'showGroupSurvei']);
    Route::get("/data-user",[PenggunaController::class,'getDataUser']);
    Route::get("/data-surveyor",[PenggunaController::class,"getdataSurveyor"]);
    Route::get("/profile-surveyor",fn()=> view('admin.profile'))->name('admin.profile');

    // proses create
    Route::post('/create-survei',[SurveiController::class,'create'])->name('create.survei');
    Route::post('/create-pertanyaan',[PertanyaanController::class,'create'])->name('create.pertanyaan');
    Route::post('/create-group',[GroupController::class,'create'])->name("create.group");
    Route::post('/tambah-user', [PenggunaController::class,'createUser'])->name("create.user");
    Route::post('/tambah-surveyor', [PenggunaController::class,'createSurveyor'])->name("create.surveyor");

    // proses edit
    Route::put('/update-survei/{id}',[SurveiController::class,'edit']);
    Route::put('/update-pertanyaan/{id}',[PertanyaanController::class,'edit']);
    Route::put('/update-group/{id}',[GroupController::class,'edit']);
    Route::put("/update-permission",[PenggunaController::class,'changePermission']);
    Route::put("/update-profile",[PenggunaController::class,'updateProfile'])->name("edit.profile");
    Route::put('/update-password',[PenggunaController::class,'changePassword'])->name("edit.password");

    // proses delete
    Route::delete('/delete-survei/{id}',[SurveiController::class,'delete']);
    Route::delete('/delete-pertanyaan/{id}',[PertanyaanController::class,'delete']);
    Route::delete("/delete-surveyor/{id}",[PenggunaController::class,'deleteSurveyor']);

    // get search data
    Route::get('/search-pengguna', [PenggunaController::class, 'searchPengguna'])->name('search.pengguna');
    Route::get('/search-surveyor', [PenggunaController::class, 'searchSurveyor'])->name('search.surveyor');
});


Route::middleware(['auth',"role:1"])->group(function(){

    // dashboard-user
    Route::get('/dashboard-user',function(){ return view('user.dashboard'); })->name('user.dashboard');
    Route::get('/user/survei',[SurveiController::class,'index'])->name('user.survei');
    Route::get("/profile-user",fn()=> view('user.profile'))->name('user.profile');
    Route::get("/pengerjaan/{survei_id}",[PengerjaanController::class,'index']);
    Route::get("/pengerjaan-group/{group_id}/{survei_id}",[PengerjaanController::class,'pengerjaanGroup']);
    Route::get("/group-user",[GroupController::class,'getUserGroup'])->name('user.group');
    Route::get('/history-nilai',[PengerjaanController::class,'historyNilai'])->name('user.history');

    Route::get("/detail-pengerjaan-user/{survei_id}",[PengerjaanController::class,'detailPengerjaanUser']);
    Route::get("/data-detail-group-user/{group_id}",[GroupController::class,'dataDetailGroupUser']);
    Route::get("/detail-pengerjaan-user-group/{group_id}/{survei_id}",[PengerjaanController::class,'detailPengerjaanUserGroup']);


    Route::post("/selesai-mengerjakan/{survei_id}",[PengerjaanController::class,'selesaiPengerjaan'])->name("selesaiPengerjaan");
    Route::post("/selesai-mengerjakan/{survei_id}/{group_id}",[PengerjaanController::class,'selesaiPengerjaanGroup'])->name("selesaiPengerjaanGroup");

    // Edit
    Route::put("/update-profile-user", [PenggunaController::class, 'updateProfile'])->name("edit_user.profile");
    Route::put('/update-password-user', [PenggunaController::class, 'changePassword'])->name("edit_user.password");
    Route::post('/join-group',[GroupController::class,'joinGroup'])->name('proses.joinGroup');
});
