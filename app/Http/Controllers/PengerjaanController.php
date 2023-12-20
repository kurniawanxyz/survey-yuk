<?php

namespace App\Http\Controllers;

use App\Models\Pengerjaan;
use App\Models\Survei;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengerjaanController extends Controller
{
    protected function index($survei_id){
        $questions = Survei::find($survei_id)->pertanyaan;
        return view('user.pengerjaan',compact('questions'));
    }

    protected function pengerjaanGroup($group_id,$survei_id){
        $questions = Survei::find($survei_id)->pertanyaan;
        return view('user.pengerjaanGroup',compact('questions','group_id'));
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
    protected function selesaiPengerjaanGroup(Request $request , $survei_id,$group_id){
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
            "group_id" => $group_id,
            "nilai" => $nilai,
       ]);

       toastr()->success("Kamu berhasil menyelesaikan survei");
       return redirect()->route('user.group');

    }

    protected function detailPengerjaanUser($survei_id){
        $pengerjaan = Auth::user()->pengerjaan->whereNull('group_id')->where('survei_id',$survei_id);
        $survei = Survei::with('pertanyaan')->find($survei_id);
        $avgNilai = number_format(Pengerjaan::where('survei_id',$survei_id)->avg('nilai'),1);
        $nilaiTerendah = $survei->pertanyaan->count();
        // dd($avgNilai);

        return response()->json([
            "pengerjaan"=>$pengerjaan,
            "survei" => $survei,
            "nilaiRerata" => $avgNilai,
            "nilaiTerendah" => $nilaiTerendah
        ]);
    }

    protected function historyNilai(){
        $histories = User::find(Auth::user()->id)->pengerjaan()->with('group','survei.pertanyaan',)->paginate(5);
        return view('user.history',compact('histories'));
    }

    protected function detailPengerjaanUserGroup($group_id,$survei_id){
        $pengerjaan = Auth::user()->pengerjaan->where('group_id',$group_id)->where('survei_id',$survei_id);
        $survei = Survei::with('pertanyaan','kriteria')->find($survei_id);
        $avgNilai = number_format(Pengerjaan::where('survei_id',$survei_id)->where('group_id',$group_id)->avg('nilai'),1);
        $nilaiTerendah = $survei->pertanyaan->count();
        // dd($avgNilai);

        return response()->json([
            "pengerjaan"=>$pengerjaan,
            "survei" => $survei,
            "nilaiRerata" => $avgNilai,
            "nilaiTerendah" => $nilaiTerendah
        ]);
    }
}
