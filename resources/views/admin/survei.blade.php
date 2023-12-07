@extends('admin.layout.app')

@section('content')



<div class="modal fade" id="modalBuatPertanyaan" tabindex="-1" aria-labelledby="bs-example-modal-lg" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary d-flex align-items-center">
        <h4 class="modal-title" id="myLargeModalLabel">
          Buat Pertanyaan
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row row-dynamic-form">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect text-start" data-bs-dismiss="modal">
          Close
        </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<div id="tambahSurvei" class="modal fade" tabindex="-1" aria-labelledby="tambahSurveiLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-colored-header bg-primary text-white">
        <h4 class="modal-title" id="tambahSurveiLabel">
          Tambah Survei
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row">
        <form action="" method="post">
          @csrf
          <div class="col-12 form-group">
              <label class="form-label" for="judul">Judul Survei</label>
              <input class="form-control" type="text" name="judul" id="judul">
          </div>
          <div class="col-12 mt-3">
              <label class="form-label" for="Deskripsi">Deskripsi Survei</label>
              <textarea class="form-control" style="resize: none" name="deskripsi" id="Deskripsi" cols="10" rows="10"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-submit btn-light-primary text-primary font-medium">
          Save changes
        </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div id="editSurvei" class="modal fade" tabindex="-1" aria-labelledby="editSurveiLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-colored-header bg-primary text-white">
        <h4 class="modal-title" id="tambahSurveiLabel">
          Edit Survei
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row">
        <form action="" method="post">
          @csrf
          <div class="col-12 form-group">
              <label class="form-label" for="edit-judul">Judul Survei</label>
              <input class="form-control" type="text" name="judul" id="edit-judul">
          </div>
          <div class="col-12 mt-3">
              <label class="form-label" for="edit-Deskripsi">Deskripsi Survei</label>
              <textarea class="form-control" style="resize: none" name="deskripsi" id="edit-Deskripsi" cols="10" rows="10"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-edit-submit btn-light-primary text-primary font-medium">
          Save changes
        </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content modal-filled bg-light-warning">
        <div class="modal-body p-4">
          <div class="text-center text-warning">
            <i class="ti ti-alert-octagon fs-7"></i>
            <h4 class="mt-2">Pesan Peringatan</h4>
            <p class="mt-3">
              Data kamu akan terhapus dan tidak bisa dikembalikan. Apakah Kamu Yakin ?
            </p>
            <button onclick="deleteSurvei()" type="button" class="btn btn-light my-2" data-bs-dismiss="modal">
            Yakin, Lanjutkan!
            </button>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
  </div>


<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Survei</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a class="text-muted " href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item" aria-current="page">Survei</li>
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

  <div class="row ">
      <div class="col-6"></div>
      <div class="col-6 d-flex justify-content-end">
          <button data-bs-toggle="modal" data-bs-target="#tambahSurvei" class="btn btn-primary me-2">
              Buat survei
          </button>
      </div>
  </div>

  <div id="row-survei" class="row mt-3">
  </div>

@endsection
@section('script')
  <script src="{{ asset('utils/handleFormatDate.js') }}"></script>
  <script src="{{ asset('dist/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>

  <script>
        get();
        function get(){
            $("#row-survei").empty()
            axios.get('/data-survei')
            .then((res)=>{
               const survei = res.data;
               if (survei.length === 0) {
                $("#row-survei").html(
                    `
                    <h1 class="text-center text-secondary">Not Found</h1>
                    `
                )
               } else {

                 survei.forEach(element => {
                    const tanggal = handleFormatDate(element.created_at)
                    console.log(element)
                    const status = element.status_pertanyaan == 0 ? `<span class="mb-1 badge font-medium bg-light-danger text-danger">Pertanyaan kosong!</span>` : " ";
                    const button = element.status_pertanyaan == 0 ? ` <button onclick="getPertanyaan('${element.id}')" data-bs-toggle="modal" data-bs-target="#modalBuatPertanyaan" class="btn btn-danger mt-2">Buat Pertanyaan</button>` : ` <button onclick="getPertanyaan('${element.id}')" data-bs-toggle="modal" data-bs-target="#modalBuatPertanyaan" class="btn btn-primary mt-2">Atur Pertanyaan</button>`
                   const data =
                      `
                      <div class="col-md-4 survei-${element.id} single-note-item all-category">
                        <div class="card card-body">
                          <span class="side-stick"></span>
                          <h6 class="note-title w-75 mb-0" data-noteheading="Book a Ticket for Movie">${element.judul}</h6>
                          <p class="note-date fs-2">${tanggal}</p>
                          <div class="note-content">
                            <p class=" deskripsi-${element.id} note-inner-content text-truncate" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis."> ${element.deskripsi}</p>
                            <span onclick="handleTruncate('deskripsi-${element.id}','btn-handle-truncate-${element.id}')" style="cursor:pointer" class="btn-handle-truncate-${element.id} mb-1 badge font-medium bg-light-primary text-primary">Lihat lebih banyak</span>
                          </div>
                          <div class="d-flex align-items-center">
                            <a href="javascript:void(0)" class="link me-1">
                              <i class="ti ti-star fs-4 favourite-note"></i>
                            </a>
                            <button onclick="openModalDelete('${element.id}')" data-bs-toggle="modal" data-bs-target="#deleteModal" href="javascript:void(0)" class="btn btn-modal-delete border-0 shadow-none text-danger ms-2">
                            <i class="ti ti-trash fs-4 remove-note"></i>
                            </button>
                            <button onclick="getDataSurvei('${element.id}')" data-bs-toggle="modal" data-bs-target="#editSurvei" href="javascript:void(0)" class="btn btn-modal-edit border-0 shadow-none text-danger ms-2">
                                <i class="ti ti-pencil fs-5 remove-note"></i>
                            </button>
                            ${status}
                          </div>
                           ${button}
                        </div>
                      </div>
                      `
                      $("#row-survei").append(data)
                  })
                }
            })
            .catch((err)=>{
                console.log(err)
            })
        }

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

        $(".btn-submit").click(function(){
            const judul = $("#judul").val();
            const deskripsi = $("#Deskripsi").val();
            axios.post("{{ route('create.survei') }}",{judul,deskripsi})
            .then((res)=>{
                $("#tambahSurvei").fadeOut();
                $(".modal-backdrop").hide();
                $(".modal-open").css('overflow','auto');
                get();
                $("#tambahSurvei form").trigger('reset');

                toastr.success(res.data.message)
              console.log(res)
            })
            .catch((err)=>{
                console.log(err.response.data)
                for (let i = 0; i < err.response.data.errors.length; i++) {
                    const element = err.response.data.errors[i];
                    toastr.error(element)
                }
            })
        })


        function getDataSurvei(id){
            axios.get(`/data-edit-survei/${id}`)
            .then((res)=>{
                const survei = res.data;
                $("#edit-judul").val(survei.judul)
                $("#edit-Deskripsi").val(survei.deskripsi)
                $("#editSurvei").attr("data-survei_id",id)
            })
            .catch((err)=>{
                console.log(err);
            })
        }

        $(".btn-edit-submit").click(function(){
            const judul = $("#edit-judul").val()
            const deskripsi = $("#edit-Deskripsi").val()
            const id = $("#editSurvei").attr("data-survei_id");

            axios.put("/update-survei/"+id,{judul,deskripsi})
            .then((res)=>{
                $("#editSurvei").fadeOut();
                $(".modal-backdrop").hide();
                get()
                $(".modal-open").css('overflow','auto');
                toastr.success(res.data.message)
            })
            .catch((err)=>{
                console.log(err)
            })
        })

       function openModalDelete(id){
            $("#deleteModal").attr("data-survei_id",id)
            console.log(id)
        }

        function deleteSurvei(){
            const id = $("#deleteModal").attr("data-survei_id");
            console.log(id)
            axios.delete("delete-survei/"+id)
            .then((res)=>{
                get()
                toastr.success(res.data.message)
            })
            .catch((err)=>{
                console.log(err)
            })
        }

        function handleDeletePertanyaan(id, survey_id, button) {
             // Menonaktifkan tombol
  $(`.${button}`).attr('disabled', true);

// Menampilkan animasi spinner
$(`.${button}`).html(`
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
`);

// Menunda pemanggilan Axios selama 2 detik
setTimeout(() => {
  axios
    .delete('delete-pertanyaan/' + id)
    .then((res) => {
      get();
      getPertanyaan(survey_id);
      toastr.success(res.data.message);
    })
    .catch((err) => {
      // Tangani kesalahan jika ada
      console.log(err.response.data)
                for (let i = 0; i < err.response.data.errors.length; i++) {
                    const element = err.response.data.errors[i];
                    toastr.error(element)
                }
    })
}, 1000);

}


    function handleEditPertanyaan(id,text_id,status_id,button,survey_id){
                    // Menonaktifkan tombol
            $(`.${button}`).attr('disabled', true);

            // Menampilkan animasi spinner
            $(`.${button}`).html(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            `);
            const text = $(`#pertanyaan-${id}`).val();
            console.log(text)
            const status = $(`#${status_id}`).val();

            // Menunda pemanggilan Axios selama 3 detik
            setTimeout(() => {
            axios
                .put('update-pertanyaan/'+id,{text,status})
                .then((res) => {
                getPertanyaan(survey_id);
                toastr.success(res.data.message);
                })
                .catch((err) => {
                    console.log(err.response.data)
                    for (let i = 0; i < err.response.data.errors.length; i++) {
                        const element = err.response.data.errors[i];
                        toastr.error(element)
                    }
                })
                .finally(()=>{
                    $(`.${button}`).attr('disabled', false);
                })
            }, 1000);
    }

        function getPertanyaan(id){
            console.log(id)
            axios.get("data-pertanyaan/"+id)
            .then((res)=>{
                $("#modalBuatPertanyaan .row-dynamic-form").empty()
                const pertanyaan = res.data;
                let formPertanyaan;

                console.log(pertanyaan)
                $.each(pertanyaan,(index,data)=>{
                    formPertanyaan = `
                <form id="form-pertanyaan-${data.id}">
                        <span>Pertanyaan ${index+1}</span>
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="mb-3">
                                <textarea name="pertanyaan" id="pertanyaan-${data.id}" cols="40" rows="1" placeholder="Pertanyaan" class="form-control" style="resize: none">${data.text}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                        <select class="form-select" id="status-${data.id}" name="status-pertama">
                            <option disabled selected>Status</option>
                            <option ${ data.status == "fav" ? "selected" : "" } value="fav">Favorite</option>
                            <option ${ data.status == "unfav" ? "selected" : "" } value="unfav">Tidak Favorite</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="mb-3 text-center">
                        <button onclick="handleEditPertanyaan('${data.id}','pertanyaan-${data.id}','status-${data.id}','btn-edit-pertanyaan-${data.id}','${id}')" class="

                            btn
                            btn-warning
                            btn-edit-pertanyaan-${data.id}
                            font-weight-medium
                            waves-effect waves-light
                            " type="button">
                            <i class="ti ti-pencil fs-5"></i>
                        </button>
                        <button onclick="handleDeletePertanyaan('${data.id}','${id}','btn-delete-pertanyaan-${data.id}')" class="
                            btn
                            btn-danger
                            btn-delete-pertanyaan-${data.id}
                            font-weight-medium
                            waves-effect waves-light
                            " type="button">
                            <i class="ti ti-circle-minus fs-5"></i>
                        </button>
                        </div>
                    </div>
                </div>
                </form>

                    `

                    $("#modalBuatPertanyaan  .row-dynamic-form").append(formPertanyaan);
                })



                let formBuatPertanyaan = `
                <form id="buat-pertanyaan">
                        <span>Buat pertanyaan</span>
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="mb-3">
                                <textarea name="pertanyaan" id="pertanyaan-pertama" cols="40" rows="1" placeholder="Pertanyaan" class="form-control" style="resize: none"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                        <select class="form-select" id="status-pertama" name="status-pertama">
                            <option disabled selected>Status</option>
                            <option value="fav">Favorite</option>
                            <option value="unfav">Tidak Favorite</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="mb-3 text-center">
                        <button onclick="tambahFormPertanyaan('${id}')" class="
                            btn
                            btn-success
                            font-weight-medium
                            waves-effect waves-light
                            " type="button">
                            <i class="ti ti-circle-plus fs-5"></i>
                        </button>
                        </div>
                    </div>
                </div>
                </form>
                `


                $("#modalBuatPertanyaan  .row-dynamic-form").append(formBuatPertanyaan);


            })
            .catch((err)=>{
                console.log(err)
            })
        }

        function tambahFormPertanyaan(id){

            const text = $("#pertanyaan-pertama").val()
            const status = $("#status-pertama").val()

            axios.post("create-pertanyaan",{id,text,status})
            .then((res)=>{
                $("#buat-pertanyaan").trigger('reset');
                getPertanyaan(id);
                console.log(res.data);
            })
            .catch((err)=>{
                console.log(err)
            })

        }



  </script>
@endsection
