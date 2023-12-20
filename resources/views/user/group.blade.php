@extends('user.layouts.app')

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Group </h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item" aria-current="page">Group</li>
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

<div class="card w-100 bg-light-secondary overflow-hidden shadow-none">
    <div class="card-body py-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-sm-6">
          <h5 class="fw-semibold mb-9 fs-5">Group Survei</h5>
          <p class="mb-9">
            Masuklah ke group survei supaya mendapatkan akses ke survei yang tidak semua orang dapatkan
          </p>
         <form action="{{route('proses.joinGroup')}}" method="post" class="">
            @csrf
            <label for="code" class="d-flex flex-column">
                <span class="form-label">Code Group</span>
            </label>
            <div class="d-flex gap-2">
                <input type="text" placeholder="Masukan code group" name="code" id="code" class="form-control">
                <button class="btn btn-secondary">Gabung</button>
            </div>
         </form>
        </div>
        <div class="col-sm-5">
          <div class="position-relative mb-n5 text-center">
            <img src="{{asset('dist/backgrounds/track-bg.png')}}" alt="" class="img-fluid" style="width: 180px; height: 230px;">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="modalDetailGroup" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary d-flex align-items-center">

            <div class="card w-100 bg-light-info overflow-hidden shadow-none">
                <div class="card-body py-3">
                  <div class="row justify-content-between align-items-center">
                    <div class="col-sm-6">
                      <h5 id="nama-group" class="fw-semibold mb-9 fs-5"></h5>
                      <p id="deskripsi-group" class="mb-9"></p>
                    </div>
                    <div class="col-sm-5">
                      <div class="position-relative mb-n7 text-end">
                        <img src="{{asset('dist/backgrounds/welcome-bg2.png')}}" alt="" class="img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="modal-body">
          <div class="card-body">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-selected="true">
                    <span>Anggota</span>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="false" tabindex="-1">
                    <span>Survei</span>
                  </a>
                </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                  <div class="p-3">
                    <table id="tb-anggota" class="table">
                      <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>Email</td>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane p-3" id="profile" role="tabpanel">
                  <table id="tb-survei" class="table">
                    <thead>
                      <tr>
                          <td>No</td>
                          <td>Survei</td>
                          <td>Action</td>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>

    <!-- /.modal-dialog -->
</div>


<div id="detail-survei" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-colored-header bg-primary text-white">
            <div class="card w-100 bg-light-secondary overflow-hidden shadow-none">
                <div class="card-body py-3">
                  <div class="row justify-content-between align-items-center">
                    <div class="col-sm-12">
                      <h5 class="fw-semibold mb-9 fs-5" id="judul">kontol</h5>
                      <div class="">
                          <p class="mb-0 text-truncate" id="deskripsi"></p>
                          <span onclick="handleTruncate('deskripsi','btn-handle-truncate')" style="cursor:pointer" class="btn-handle-truncate mb-1 badge font-medium bg-light-primary text-primary">Lihat lebih banyak</span>
                      </div>
                      <span class="">Dibuat oleh<span class="badge bg-light-primary text-primary" id="kreatorSurvei">admin</span></span>
                      <div class="detail-penjelasan d-none">
                          <div class=" mt-4 d-flex justify-content-start gap-3">
                                <div class="">
                                    <h6 class="text-center">Nilai Maksimal</h6>
                                    <span id="nilaiTertinggi">20</span>
                                </div>
                                <div class="">
                                    <h6>Nilai rata-rata</h6>
                                    <span id="nilaiRerata">9.4</span>
                                </div>
                                <div class="">
                                    <h6>Nilai Minimum</h6>
                                    <span id="nilaiTerendah">5</span>
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

  <div class="row row-group">
    @forelse ($groups as $group )
    <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="p-4 d-flex align-items-stretch h-100">
                <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center bg-primary rounded  justify-content-center">
                        <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path fill="currentColor" d="M10.27 12h3.46a1.5 1.5 0 0 0 1.48-1.75l-.3-1.79a2.951 2.951 0 0 0-5.82.01l-.3 1.79c-.15.91.55 1.74 1.48 1.74zm-8.61-.89c-.13.26-.18.57-.1.88c.16.69.76 1.03 1.53 1h1.95c.83 0 1.51-.58 1.51-1.29c0-.14-.03-.27-.07-.4c-.01-.03-.01-.05.01-.08c.09-.16.14-.34.14-.53c0-.31-.14-.6-.36-.82c-.03-.03-.03-.06-.02-.1c.07-.2.07-.43.01-.65a1.12 1.12 0 0 0-.99-.74a.09.09 0 0 1-.07-.03C5.03 8.14 4.72 8 4.37 8c-.3 0-.57.1-.75.26c-.03.03-.06.03-.09.02a1.24 1.24 0 0 0-1.7 1.03c0 .02-.01.04-.03.06c-.29.26-.46.65-.41 1.05c.03.22.12.43.25.6c.03.02.03.06.02.09zm14.58 2.54c-1.17-.52-2.61-.9-4.24-.9c-1.63 0-3.07.39-4.24.9A2.988 2.988 0 0 0 6 16.39V17c0 .55.45 1 1 1h10c.55 0 1-.45 1-1v-.61c0-1.18-.68-2.26-1.76-2.74zm-15.02.93A2.01 2.01 0 0 0 0 16.43V17c0 .55.45 1 1 1h3.5v-1.61c0-.83.23-1.61.63-2.29c-.37-.06-.74-.1-1.13-.1c-.99 0-1.93.21-2.78.58zm21.56 0A6.95 6.95 0 0 0 20 14c-.39 0-.76.04-1.13.1c.4.68.63 1.46.63 2.29V18H23c.55 0 1-.45 1-1v-.57c0-.81-.48-1.53-1.22-1.85zM22 11v-.5c0-1.1-.9-2-2-2h-2c-.42 0-.65.48-.39.81l.7.63c-.19.31-.31.67-.31 1.06c0 1.1.9 2 2 2s2-.9 2-2z"/></svg>
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                        <div>
                            <span href="javascript:void(0)" class="text-dark fs-4 link lh-sm">
                                {{$group->nama}}
                            </span>
                            <h6 class="card-subtitle mt-2 mb-0 fw-normal text-muted">
                                By {{$group->kreator->nama}}
                            </h6>
                            <div class="d-flex gap-1 mt-2">
                                <button onclick="handleDetail('{{$group->nama}}','{{$group->deskripsi}}','{{$group->kreator->nama}}','{{$group->id}}')" data-bs-toggle="modal" data-bs-target="#modalDetailGroup" class="btn btn-success w-100 p-0">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty

    @endforelse
  </div>

@endsection

@section('script')
<script src="{{asset('utils/handleFormatDate.js')}}"></script>
<script src="{{asset('utils/handleKategori.js')}}"></script>
<script>

function handleTruncate(className,button){
    // Memeriksa elemen dengan kelas tertentu

      if ($('#'+className).hasClass('text-truncate')) {
          $(`.${button}`).text("Lihat lebih sedikit")
      // Jika elemen memiliki kelas text-truncate, hapus kelas tersebut
      $(`#${className}`).removeClass('text-truncate');
      } else {
          $(`.${button}`).text("Lihat lebih banyak")
      // Jika elemen tidak memiliki kelas text-truncate, tambahkan kelas tersebut
      $(`#${className}`).addClass('text-truncate');
      }
}

function handleDetailSurvei(judul,deskripsi,kreator,id){
      $("#judul").text(judul);
      $("#deskripsi").text(deskripsi);
      $("#kreatorSurvei").text(kreator);

      $(".btn-kerjakan").attr("data-survei_id",id);
      const group_id = $(".btn-kerjakan").attr("data-group_id");

axios.get(`/detail-pengerjaan-user-group/${group_id}/${id}`)
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
            <td>${handleKriteria(survei.kriteria,data.nilai) }</td>
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

    function handleDetail(judul,deskripsi,kreator,id)
    {
      $("#nama-group").text(judul)
      $("#deskripsi-group").text(deskripsi)

      axios.get("/data-detail-group-user/"+id)
      .then(res=>{

        $(".btn-kerjakan").attr("data-group_id",id);

            const anggota = res.data.anggota;
            const surveis = res.data.surveis;
            $("#tb-anggota tbody").empty()
            $.each(anggota,(index,data)=>{
                const element =`
                <tr>
                    <td>${index+1}</td>
                    <td>${data.nama}</td>
                    <td>${data.email}</td>
                    </tr>
                        `
                $("#tb-anggota tbody").append(element)
            })

            $("#tb-survei tbody").empty()
            $.each(surveis,(index,data)=>{
                console.log(data);
                const element =`
                    <tr>
                        <td>${index+1}</td>
                        <td>${data.judul}</td>
                        <td>
                            <button onclick="handleDetailSurvei('${data.judul}','${data.deskripsi}','${data.kreator.nama}','${data.id}')" data-bs-target="#detail-survei" data-bs-toggle="modal" class="btn btn-warning">Detail</button>
                        </td>
                    </tr>
                        `
                $("#tb-survei tbody").append(element)
            })
      })
      .catch(err=>{
        console.log(err)
      })

    }

    $("#formKerjakan").submit(function(e){
            e.preventDefault()
            const survei_id = $(".btn-kerjakan").attr("data-survei_id");
            const group_id = $(".btn-kerjakan").attr("data-group_id");
            location.href = `/pengerjaan-group/${group_id}/${survei_id}`
    })

  </script>
@endsection
