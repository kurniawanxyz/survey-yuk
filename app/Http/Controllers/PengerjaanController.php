<?php

namespace App\Http\Controllers;

use App\Models\Pengerjaan;
use App\Models\Survei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengerjaanController extends Controller
{
    protected function index($survei_id){
        $questions = Survei::find($survei_id)->pertanyaan;
        return view('user.pengerjaan',compact('questions'));
    }

    protected function selesaiPengerjaan(Request $request , $survei_id){
        // dd($request);
        $survei = Survei::find($survei_id);
        $pertanyaan = $survei->pertanyaan;
        $nilai = 0;
        foreach ($pertanyaan as $key => $data) {
            if($data->status == "fav"){
                if($request->input('jawaban-'.$data->id) == "sangat-setuju" ){
                    $nilai = $nilai + 4;
                }
                if($request->input('jawaban-'.$data->id) == "setuju" ){
                    $nilai = $nilai + 3;
                }
                if($request->input('jawaban-'.$data->id) == "biasa" ){
                    $nilai = $nilai + 2;
                }
                if($request->input('jawaban-'.$data->id) == "tidak-setuju" ){
                    $nilai = $nilai + 1;
                }
            }else{
                if($request->input('jawaban-'.$data->id) == "sangat-setuju" ){
                    $nilai = $nilai + 1;
                }
                if($request->input('jawaban-'.$data->id) == "setuju" ){
                    $nilai = $nilai + 2;
                }
                if($request->input('jawaban-'.$data->id) == "biasa" ){
                    $nilai = $nilai + 3;
                }
                if($request->input('jawaban-'.$data->id) == "tidak-setuju" ){
                    $nilai = $nilai + 4;
                }
            }
        }

       Pengerjaan::create([
            "user_id" => auth()->user()->id,
            "survei_id" => $survei_id,
            "nilai" => $nilai,
       ]);

       toastr()->success("Kamu berhasil menyelesaikan survei");
       return redirect()->route('user.survei');

    }
}
