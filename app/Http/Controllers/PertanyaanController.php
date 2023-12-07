<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\Survei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PertanyaanController extends Controller
{
    //

    protected function get($id)
    {
        $pertanyaan = Pertanyaan::where('survei_id',$id)->get();
        return response()->json($pertanyaan);
    }

    protected function edit($id,Request $request)
    {
     
        $validator = Validator::make($request->all(), [
            "text" => "max:1000|string|required",
            "status" => "string|required"
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all();
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $errors
            ], 422);
        }


        $pertanyaan = Pertanyaan::findOrFail($id)->update([
            "text" => $request->text,
            "status" => $request->status,
        ]);

        return response()->json(["message"=>"Congratulations on successfully creating a question!"]);

    }

    protected function create(Request $request)
    {


        $validator = Validator::make($request->all(), [
            "text" => "max:1000|string|required",
            "status" => "string|required"
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->all();
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $errors
            ], 422);
        }


        Pertanyaan::create([
            "text" => $request->text,
            "status" => $request->status,
            "survei_id" => $request->id,
        ]);

        $survei = Survei::find($request->id)->update([
            "status_pertanyaan" => true
        ]);

        return response()->json(["message"=>"Congratulations on successfully creating a question!"]);
    }

    protected function delete($id){
        Pertanyaan::findOrFail($id)->delete();
        return response()->json(["message"=>"Congratulations on successfully deleted a question!"]);
    }


}
