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
                      <p class="mb-9" id="deskripsi">

                      </p>
                      <span>Dibuat oleh<p id="kreatorSurvei"></p></span>
                      <form id="formKerjakan" method="get">
                          @csrf
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
          <table class="table" id="pengerjaan">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Tanggal Pengerjaan</td>
                    <td>Nilai</td>
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
                <button onclick="handleDetailSurvei('{{$survei->judul}}','{{$survei->deskripsi}}','{{$survei->id}}','{{$survei->kreator->nama}}')" data-bs-toggle="modal" data-bs-target="#detail-survei" class="btn btn-primary mt-2">Detail</button>
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

        function handleDetailSurvei(judul,deskripsi,id,kreator)
        {
            $("#judul").text(judul);
            $("#deskripsi").text(deskripsi);
            $("#kreatorSurvei").text(kreator);
            $(".btn-kerjakan").attr("data-survei_id",id);
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
