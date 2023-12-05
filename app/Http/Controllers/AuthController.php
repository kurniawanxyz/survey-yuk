<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // dd($request);

    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        toastr()->error("Gagal Login");
        return back();
    }

    $user = User::where('email',$request->email)->first();

        if(Hash::check($user->password,Hash::make($request->password))){
            toastr()->error("Password Salah");
            return back();
        }

    if ($user->role_id == 1) {
        toastr()->success("Berhasil login");
        return redirect()->intended(route('user.dashboard'));
    } else {
        toastr()->success("Berhasil login");
        return redirect()->intended(route('admin.dashboard'));
    }
}

    public function register(Request $request)
{


    // dd($request);
     $request->validate([
        'nama' => 'required|max:50',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
    ]);

    $user = new User;
    $user->nama = $request->nama;
    $user->email = $request->email;
    $user->role_id = 1;
    $user->password = Hash::make($request->password);
    $user->save();


    toastr()->success("Sukses Register");
    return redirect()->intended(route('page.login'));

}

}
