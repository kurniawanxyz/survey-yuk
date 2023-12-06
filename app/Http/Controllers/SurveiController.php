<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SurveiController extends Controller
{

    protected function get()
    {
        $survei = Survei::where('kreator_id',Auth::user()->id)->get();
        return response()->json($survei);
    }

    protected function show($id)
    {
        $survei = Survei::find($id);
        return response()->json($survei);
    }

    protected function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "judul" => "max:50|string|required",
            "deskripsi" => "max:1000|string|required"
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all();
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $errors
            ], 422);
        }


        Survei::create([
            "judul" => $request->judul,
            "deskripsi" => $request->deskripsi,
            "kreator_id" => Auth::user()->id,
        ]);

        return response()->json(["message"=>"Congratulations on successfully creating a survey!"]);
    }

    protected function edit( $id ,Request $request)
    {
        $validator = Validator::make($request->all(), [
            "judul" => "max:50|string",
            "deskripsi" => "max:1000|string"
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all();
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $errors
            ], 422);
        }

        $survei = Survei::find($id);
        $survei->judul = $request->judul;
        $survei->deskripsi = $request->deskripsi;
        $survei->save();


        return response()->json(["message"=>"Congratulations on successfully edit a survey!"]);

    }

    protected function delete($id)
    {
        $survei = Survei::find($id)->delete();
        return response()->json(["message"=>"Congratulations on successfully deleted a survey!"]);
    }
}
