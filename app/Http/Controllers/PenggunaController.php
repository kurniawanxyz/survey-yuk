<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    //
    protected function createUser(Request $request){

        $validator = Validator::make($request->all(),[
            "fotoProfile" => "required|image|max:2048",
            "nama" => "required|string|max:50",
            "email" => "email|required|string|max:50|unique:users,email",
            "password" => "required|string"
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all();
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $errors
            ], 422);
        }


        $image = time() . '.' . $request->fotoProfile->extension();
        $request->fotoProfile->storeAs("profile",$image);

        User::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role_id" => 1,
        ]);

        return response()->json(["message"=>"Berhasil membuat user"]);
    }

    protected function createSurveyor(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "fotoProfile" => "required|image|max:2048",
            "nama" => "required|string|max:50",
            "email" => "email|required|string|max:50|unique:users,email",
            "password" => "required|string"
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all();
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $errors
            ], 422);
        }


        $image = time() . '.' . $request->fotoProfileSurveyor->extension();
        $request->fotoProfile->storeAs("profile",$image);

        User::create([
            "nama" => $request->namaSurveyor,
            "email" => $request->emailSurveyor,
            "password" => Hash::make($request->passwordSurveyor),
            "role_id" => 2,
        ]);

        return response()->json(["message"=>"Berhasil membuat surveyor"]);
    }

    protected function getDataUser()
    {
        $user = User::where("role_id",1)->get();
        return response()->json($user);
    }
}
