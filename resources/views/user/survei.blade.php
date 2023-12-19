@extends('user.layouts.app')

@section('content')

<div id="detail-survei" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-colored-header bg-primary text-white">
            <div class="card w-100 bg-light-secondary overflow-hidden shadow-none">
                <div class="card-body py-3">
                  <div class="row justify-content-between align-items-center">
                    <div class="col-sm-12">
                      <h5 class="fw-semibold mb-9 fs-5" id="judul"></h5>
                      <p class="mb-0" id="deskripsi">
                      </p>
                      <span class="">Dibuat oleh<span class="badge bg-light-primary text-primary" id="kreatorSurvei"></span></span>
                      <div class="detail-penjelasan d-none">
                          <div class=" mt-4 d-flex justify-content-start gap-3">
                                <div class="">
                                    <h6 class="text-center">Nilai Maksimal</h6>
                                    <span id="nilaiTertinggi">0</span>
                                </div>
                                <div class="">
                                    <h6>Nilai rata-rata</h6>
                                    <span id="nilaiRerata">0</span>
                                </div>
                                <div class="">
                                    <h6>Nilai Minimum</h6>
                                    <span id="nilaiTerendah">0</span>
                                </div>
                          </div>

                          <div class="mt-4 mb-3 d-flex align-items-start gap-2 flex-column">
                            <div class="kriteria-item d-flex flex-column">
                                <span class="kriteria-title">Bagus</span>
                                <span class="badge bg-success text-light">
                                    Lebih dari 75% nilai maksimal
                                </span>
                            </div>
                            <div class="kriteria-item d-flex flex-column">
                                <span class="kriteria-title">Sedang</span>
                                <span class="badge bg-warning text-dark">
                                    Antara 45% - 75% nilai maksimal
                                </span>
                            </div>
                            <div class="kriteria-item d-flex flex-column">
                                <span class="kriteria-title">Buruk</span>
                                <span class="badge bg-danger text-light">
                                    Kurang dari 45% nilai maksimal
                                </span>
                            </div>
                        </div>
                      </div>

                      <form id="formKerjakan" method="get">
                          @csrf
                          <button type="button" class="btn-detail-penjelasan btn btn-success">Lihat Detail</button>
                          <button class="btn-kerjakan btn btn-secondary">Kerjakan</button>
                      </form>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
    position: absolute;
    top: 10px;
    right: 10px;
"></button>
              </div>
        </div>
        <div class="modal-body">
          <table class="table" id="tabelPengerjaan">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Tanggal Pengerjaan</td>
                    <td>Nilai</td>
                    <td>Kriteria</td>
                </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">Survei </h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item" aria-current="page">survei</li>
                </ol>
              </nav>
            </div>
            <div class="col-3">
              <div class="text-center mb-n5">
                <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        @forelse ($surveis as $survei )
        {{-- @dd($survei) --}}
        <div class="col-md-4 survei-1 single-note-item all-category">
            <div class="card card-body">
              <span class="side-stick"></span>
              <h6 class="note-title w-75 mb-0" data-noteheading="Book a Ticket for Movie">{{$survei->judul}}</h6>
              <p class="note-date fs-2">{{ \Carbon\Carbon::parse($survei->created_at)->isoFormat('DD MMMM YYYY') }}</p>
              <div class="note-content">
                <p class="deskripsi-{{$survei->id}} note-inner-content text-truncate" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">{{ $survei->deskripsi }}</p>
                <span onclick="handleTruncate('deskripsi-{{$survei->id}}','btn-handle-truncate-{{$survei->id}}')" style="cursor:pointer" class="btn-handle-truncate-{{$survei->id}} mb-1 badge font-medium bg-light-primary text-primary">Lihat lebih banyak</span>
              </div>
                <button onclick="handleDetailSurvei('{{$survei->judul}}',`{{$survei->deskripsi}}`,'{{$survei->id}}','{{$survei->kreator->nama}}')" data-bs-toggle="modal" data-bs-target="#detail-survei" class="btn btn-primary mt-2">Detail</button>
            </div>
          </div>
        @empty
          <div class="row">
            <div class="col-12">
                <span>Belum ada data Survei</span>
            </div>
          </div>
        @endforelse
      </div>
@endsection

@section('script')
<script src="{{asset('utils/handleKriteria.js')}}"></script>
<script src="{{asset('utils/handleFormatDate.js')}}"></script>
      <script>
function handleTruncate(className,button){
    // Memeriksa elemen dengan kelas tertentu
  $('.' + className).each(function() {
      if ($(this).hasClass('text-truncate')) {
          $(`.${button}`).text("Lihat lebih sedikit")
      // Jika elemen memiliki kelas text-truncate, hapus kelas tersebut
      $(this).removeClass('text-truncate');
      } else {
          $(`.${button}`).text("Lihat lebih banyak")
      // Jika elemen tidak memiliki kelas text-truncate, tambahkan kelas tersebut
      $(this).addClass('text-truncate');
      }
  });
}

        $(".btn-detail-penjelasan").click(function(){

      if ($(".detail-penjelasan").hasClass('d-none')) {
          $(this).text("Sembunyikan detail")
      // Jika elemen memiliki kelas text-truncate, hapus kelas tersebut
            $(".detail-penjelasan").removeClass('d-none');
        } else {
        //   $(this).text("Lihat lebih sedikit")
      // Jika elemen memiliki kelas text-truncate, hapus kelas tersebut
            $(".detail-penjelasan").addClass('d-none');
          $(this).text("Lihat Detail");
      }


        })

        function handleDetailSurvei(judul,deskripsi,id,kreator)
        {
            $("#judul").text(judul);
            $("#deskripsi").text(deskripsi);
            $("#kreatorSurvei").text(kreator);
            $(".btn-kerjakan").attr("data-survei_id",id);

            axios.get("/detail-pengerjaan-user/"+id)
            .then(res=>{
                const pengerjaan = res.data.pengerjaan;
                const survei = res.data.survei;
                const nilaiTertinggi = survei.pertanyaan.length * 4;
                $("#nilaiTertinggi").text(nilaiTertinggi);


                $("#tabelPengerjaan tbody").empty()
                let no=0;
                let nilai = 0
                $.each(pengerjaan,(index,data)=>{
                    nilai = nilai + data.nilai
                    const element =`
                    <tr>
                        <td>${++no}</td>
                        <td>${handleFormatDate(data.created_at)}</td>
                        <td>${data.nilai}</td>
                        <td>${ handleKriteria(nilaiTertinggi,data.nilai) }</td>
                    </tr>
                    `
                    $("#tabelPengerjaan tbody").append(element)
                })
                const nilaiRerata = res.data.nilaiRerata;


                $("#nilaiRerata").text(nilaiRerata);

                $("#nilaiTerendah").text(res.data.nilaiTerendah)

            })
            .catch(err=>{
                toastr.error(err)
            })
        }

        // $(".btn-kerjakan").click(function(){
        //

        // })

        $("#formKerjakan").submit(function(e){
            e.preventDefault()
            const survei_id = $(".btn-kerjakan").attr("data-survei_id");
            location.href = "/pengerjaan/"+survei_id
        })

      </script>
@endSection
