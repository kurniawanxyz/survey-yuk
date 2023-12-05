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
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('login',[AuthController::class,'login'])->name('user.login');

// Route::middleware()->group(function () {
    Route::get('/dashboard-admin',function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
// });


// Route::middleware()->group(function(){
    Route::get('/dashboard-siswa',function(){
        return view('siswa.dashboard');
    })->name('siswa.dashboard');
// });
