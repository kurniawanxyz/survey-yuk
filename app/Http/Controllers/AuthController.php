<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        toastr()->error("Gagal Login");
        return back();
    }

    $user = Auth::user();

    if ($user->role_id == 1) {
        toastr()->success("Berhasil login");
        return redirect()->route('siswa.dashboard');
    } else {
        toastr()->success("Berhasil login");
        return redirect()->route('admin.dashboard');
    }
}
}
