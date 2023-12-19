<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class GroupController extends Controller
{
    //


    protected function getUserGroup(){
        $groups = Auth::user()->groups;
        return view('user.group',compact('groups'));
    }

    protected function get()
    {
        $group = Group::with('kreator')->where("kreator_id",Auth::user()->id)->get();
        return response()->json($group);
    }

    protected function create(Request $request)
    {


        $validator = Validator::make($request->all(), [
            "nama" => "max:50|string|required",
            "deskripsi" => "max:1000|string|required",
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all();
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $errors
            ], 422);
        }

        Group::create([
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi,
            "code" => Str::random(7),
            "kreator_id" => Auth::user()->id,
        ]);


        return response()->json(["message"=>"Berhasil membuat Group"]);

    }

    protected function edit($id,Request $request)
    {

        $validator = Validator::make($request->all(), [
            "nama" => "max:50|string|required",
            "deskripsi" => "max:1000|string|required",
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all();
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $errors
            ], 422);
        }

        Group::findOrFail($id)->update([
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi,
        ]);

        return response()->json(["message"=>"Berhasil mengupdate group"]);

    }

    protected function show($id)
    {
        $group = Group::with('users')->findOrFail($id);
        return response()->json($group);
    }

    protected function showGroupSurvei()
    {
        $group = Group::where('kreator_id',Auth::user()->id)->get();
        return response()->json($group);
    }

}
