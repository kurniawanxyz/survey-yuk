@extends('user.layouts.pengerjaan')

@section('content')
{{-- @dd($group_id) --}}
<form action="{{ route('selesaiPengerjaanGroup', ['survei_id' => $questions[0]->survei_id, 'group_id' => $group_id]) }}"  id="selesaiPertanyaan" method="post" class="d-flex flex-column gap-4">
    @csrf
    @foreach ($questions as $i=> $question)
    <div class="row w-100 card" id="pertanyaan-{{$question->id}}">
        <div class="card-body">
            <div class="col-12">
                <h5>{{$i+1}} . {{$question->text}}</h5>
            </div>
            <div class="col-12 d-flex justify-content-start gap-4" >
                <label for="pertanyaan-{{$question->id}}-1">
                    <input onclick="handleJawaban('{{$question->id}}')" type="radio" value="sangat-setuju" name="jawaban-{{$question->id}}" id="pertanyaan-{{$question->id}}-1">
                    <span>Sangat Sesuai</span>
                </label>
                <label for="pertanyaan-{{$question->id}}-2">
                    <input onclick="handleJawaban('{{$question->id}}')" type="radio" value="setuju" name="jawaban-{{$question->id}}" id="pertanyaan-{{$question->id}}-2">
                    <span>Sesuai</span>
                </label>
                <label for="pertanyaan-{{$question->id}}-3">
                    <input onclick="handleJawaban('{{$question->id}}')" type="radio" value="biasa" name="jawaban-{{$question->id}}" id="pertanyaan-{{$question->id}}-3">
                    <span>Biasa</span>
                </label>

                <label for="pertanyaan-{{$question->id}}-4">
                    <input onclick="handleJawaban('{{$question->id}}')" type="radio" value="tidak-setuju" name="jawaban-{{$question->id}}" id="pertanyaan-{{$question->id}}-4">
                    <span>Tidak Sesuai</span>
                </label>
            </div>
        </div>
    </div>
    @endforeach
    <div class="modal fade" id="modalSelesai" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content modal-filled bg-light-warning">
            <div class="modal-body p-4">
              <div class="text-center text-warning">
                <i class="ti ti-alert-octagon fs-7"></i>
                <h4 class="mt-2">Peringatan !!</h4>
                <p class="mt-3">
                  Pastikan semua pertanyaan diisi karena data yang sudah dikirimkan tidak bisa diubah kembali. Yakin ?
                </p>
                <button type="submit" class="btn btn-light my-2" data-bs-dismiss="modal">
                  Yakin
                </button>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
      </div>
    <div class="w-100 card bg-primary py-2 px-4 d-flex justify-content-around flex-row align-items-center">
                <div class="">
                    <h5 class="text-white">Total Pertanyaan</h5>
                    <span class="text-light-primary">{{$questions->count()}} Pertanyaan</span>
                </div>
                <div class="">
                    <h5 class="text-white">Pertanyaan diisi</h5>
                    <span class="text-light-primary"><span id="pertanyaanDiIsi">0</span> Pertanyaan</span>
                </div>
                <div class="">
                    <button class="btn btn-success btn-selesai" type="button" data-bs-toggle="modal" data-bs-target="#modalSelesai">Selesai</button>
                </div>
    </div>
</form>
@endsection

@section('script')
    <script>
        handleJawaban('{{ $questions[0]->id }}')
        function handleJawaban(id){
            const pertanyaanDiIsi = $("input[type='radio']:checked").length
            const totalPertanyaan = "{{$questions->count()}}"
            $(`#icon-${id}`).addClass("text-success");
            $("#pertanyaanDiIsi").text(pertanyaanDiIsi);
            if(!(pertanyaanDiIsi == totalPertanyaan)){
                $(".btn-selesai").addClass("btn-outline-success")
            }else{
                $(".btn-selesai").removeClass("btn-outline-success")

            }
            $(".btn-selesai").attr('disabled', !(pertanyaanDiIsi == totalPertanyaan))
        }


    </script>
@endsection
