<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\SurveiGroup;
use App\Models\Group;
use App\Models\User;

class SurveiController extends Controller
{


    protected function get()
    {
        $survei = Survei::where('kreator_id',Auth::user()->id)->get();
        return response()->json($survei);
    }

    protected function show($id)
    {
        $survei = Survei::with('groups')->find($id);
        $group = Group::where('kreator_id',Auth::user()->id)->get();
        return response()->json([
            "survei" => $survei,
            "group" => $group,
        ]);
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




        $survei = new Survei;
        $survei->judul = $request->judul;
        $survei->deskripsi = $request->deskripsi;
        $survei->kreator_id = Auth::user()->id;
        $survei->visibility = $request->visibility;
        $survei->save();

        foreach ($request->group as $i => $row) {
            SurveiGroup::create([
                "survei_id" => $survei->id,
                "group_id" => $row,
            ]);
        }

        return response()->json(["message"=>"Congratulations on successfully creating a survey!"]);
    }

    protected function edit( $id ,Request $request)
    {
        $validator = Validator::make($request->all(), [
            "judul" => "max:50|string",
            "deskripsi" => "max:1000|string",
            "visibility" => "string"
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
        $survei->visibility = $request->visibility;

        $currentGroup = $survei->groups->pluck('id')->toArray();
        $groupNow = $request->group;

        $groupToRemove = array_diff($currentGroup,$groupNow);
        $groupToAdd = array_diff($groupNow,$currentGroup);
        // dd($groupToAdd);
        foreach ($groupToRemove as $key => $data) {
            SurveiGroup::where("survei_id",$survei->id)->where('group_id',$data)->delete();
        }
        foreach ($groupToAdd as $key => $data) {
            SurveiGroup::create([
                "survei_id" => $survei->id,
                "group_id" => $data,
            ]);
        }

        $survei->save();

        return response()->json(["message"=>"Congratulations on successfully edit a survey!"]);

    }

    protected function delete($id)
    {
        $survei = Survei::find($id)->delete();
        return response()->json(["message"=>"Congratulations on successfully deleted a survey!"]);
    }

    protected function index()
    {
        $surveis = Survei::where('visibility','public')->get();
        return view('user.survei',compact('surveis'));
    }

}
