<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Survei;
use Exception;
use Flasher\Laravel\Http\Response;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    //

    protected function createKriteria(Request $request)
    {
        $request->validate([
            "text1" => "required|max:20",
            "text2" => "required|max:20",
            "style1" => "required",
            "style2" => "required",
            "nilaiMin1" => "required",
            "nilaiMin2" => "required",
        ]);


        $survei = Survei::find($request->survei_id);
        $nilaiMaks = $survei->pertanyaan->count() * 4;
        $nilaiMaks1 = $request->nilaiMaks1 == null ? $nilaiMaks : $request->survei_id;
        $nilaiMin1 = $request->nilaiMin1;

        $nilaiMaks2 = $nilaiMaks1;
        $nilaiMin2 = $request->nilaiMin2;

        $nilaiMaks3 = $nilaiMin2;
        $nilaiMin3 = $request->nilaiMin3;

        $nilaiMaks4 = $nilaiMin3;
        $nilaiMin4 = $request->nilaiMin4;

        try {
           $kriteria1 = Kriteria::create([
                "survei_id" => $request->survei_id,
                "text" => $request->text1,
                "nilaiMaks" => $nilaiMaks1,
                "nilaiMin" => $nilaiMin1,
                "style" => $request->style1,
            ]);

            Kriteria::create([
                "survei_id" => $request->survei_id,
                "text" => $request->text2,
                "nilaiMaks" => $nilaiMaks2,
                "nilaiMin" => $nilaiMin2,
                "style" => $request->style2,
            ]);

        } catch (Exception $e) {
            // toastr()->error("Kamu harus mengisi setidaknya kriteria 1 dan 2")->error($e);
            // return back();
            return response()->json($request->text2);
        }

        if($request->text3 && $request->style3){
            Kriteria::create([
                "survei_id" => $request->survei_id,
                "text" => $request->text3,
                "nilaiMaks" => $nilaiMaks3,
                "nilaiMin" => $nilaiMin3,
                "style" => $request->style3,
            ]);
        }

        if($request->text4 && $request->style4){
            Kriteria::create([
                "survei_id" => $request->survei_id,
                "text" => $request->text4,
                "nilaiMaks" => $nilaiMaks4,
                "nilaiMin" => $nilaiMin4,
                "style" => $request->style4,
            ]);
        }

        toastr()->success("Berhasil membuat kriteria untuk survei");
        return redirect()->back();
    }

    protected function getData($survei_id){
        $survei = Survei::find($survei_id);
        $nilaiMaks = $survei->pertanyaan->count() * 4;

        return response()->json($nilaiMaks);
    }
}
