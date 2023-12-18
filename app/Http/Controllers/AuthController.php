<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {


    $userTes = User::where('email',$request->email)->first();

    if($userTes == null){
        toastr()->error("Akun tidak ditemukan");
        return redirect()->back();
    }

    if($userTes->persetujuan_surveyor == "menunggu"){
        toastr()->error("Admin belum mengsetujui kamu menjadi surveyor");
        return redirect()->back();
    }

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

    if($user->persetujuan_surveyor == "menunggu"){
        toastr()->error("Admin belum mengsetujui kamu menjadi surveyor");
        return redirect()->back();
    }

        if(Hash::check($user->password,Hash::make($request->password))){
            toastr()->error("Password Salah");
            return back();
        }

    if ($user->role_id == 1) {
        toastr()->success("Berhasil login");
        return redirect()->route('user.dashboard');
    } else {
        toastr()->success("Berhasil login");
        return redirect()->route('admin.dashboard');
    }
}

    public function register(Request $request)
{


    // dd($request);
     $request->validate([
        'nama' => 'required|max:50',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'role_id' => 'required|numeric|max:2'
    ]);

    $user = new User;
    $user->nama = $request->nama;
    $user->email = $request->email;
    $user->role_id = $request->role_id;
    if($request->role_id == 2){
        $user->persetujuan_surveyor = "menunggu";
    }
    $user->password = Hash::make($request->password);
    $user->save();


    if($request->role_id == 2){
        toastr()->success("Sukses Register")->success("Tunggulah sampai admin mengsetujuimu menjadi surveyor");
    }else{
        toastr()->success("Sukses Register");
    }
    return redirect()->intended(route('page.login'));
}

public function logout()
{
    Auth::logout();
    toastr()->success("Berhasil Logout");
    return redirect()->route('page.login');
}

    public function forgotPasswordMail(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'email' => 'required|email:rfc,dns|exists:users,email'
            ]);
            if($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator->errors());
            }
            DB::beginTransaction();
            $user = User::where('email', $request->email)->first();
            if(!$user){
                return redirect()->back()->withInput()->withErrors(['email' => 'Email tidak ditemukan!']);
            }

            $exist = ForgotPassword::where('user_id', $user->id)->first();
            if($exist){
                $exist->delete();
            }

            $tokenForgot = new ForgotPassword;
            $tokenForgot->token = Str::random(35);
            $tokenForgot->user_id = $user->id;
            $tokenForgot->expired = now()->addMinutes(30);
            $tokenForgot->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($tokenForgot));

            DB::commit();
            return view('await-email', compact('user'));
        }catch(\Exception $e){
            DB::rollBack();
            // dd($e);
            toastr()->error('Ada kesalahan server!');
            return back();
        }
    }

    public function forgotPasswordResetView($token, $email){
        return view('auth.forgot-password-reset', compact('token', 'email'));
    }

    public function forgotPasswordReset(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email:rfc,dns|exists:users,email',
            'token' => 'required',
            'password' => 'required|min:8',
            'confirmation_password' => 'required|same:password'
        ]);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }

        $user = User::whereHas('forgotPassword', function($query)use ($request){
            $query->where('token', $request->token);
        })->first();

        if(!$user){
            toastr()->error('Token tidak valid!');
            return back()->with(['error' => "Token tidak valid"]);
        }

        $forgotPassModel = ForgotPassword::where('token', $request->token)->first();
        if(now()->gt($forgotPassModel->expired)){
            toastr()->error("Waktu Reset password sudah kadaluarsa");
            return back();
        }

        $user->password = Hash::make($request->password);
        $user->save();


        toastr()->success("Berhasil mengganti password");
        return to_route('page.login');
    }
}
