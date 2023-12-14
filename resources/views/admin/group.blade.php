@extends('admin.layout.app')

@section('content')


<div id="modalDetailGroup" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary d-flex align-items-center">

            <div class="card w-100 bg-light-info overflow-hidden shadow-none">
                <div class="card-body py-3">
                  <div class="row justify-content-between align-items-center">
                    <div class="col-sm-6">
                      <h5 id="nama-group" class="fw-semibold mb-9 fs-5">X Rpl</h5>
                      <p id="deskripsi-group" class="mb-9">
                        You have earned 54% more than last month
                        which is great thing.
                      </p>
                      <div style="font-size: 20px" class="p-2 bg-primary w-100 text-white rounded">
                        <i class="ti ti-share-3"></i> Share Code : <span id="group-code">JSNdak</span>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="position-relative mb-n7 text-end">
                        <img src="../../dist/images/backgrounds/welcome-bg2.png" alt="" class="img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col-12">
                    <table id="tabel-anggota" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn-submit-group btn btn-primary text-white font-medium waves-effect">
            Save changes
          </button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>

    <!-- /.modal-dialog -->
</div>

<div id="modalEditGroup" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" style="display: none;" aria-hidden="true">
    <form method="post">
        @csrf
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary d-flex align-items-center">
          <h4 class="modal-title" id="myModalLabel">
            Edit Group
          </h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col-12">
                    <label class="form-label" for="nama">Nama group</label>
                    <input class="form-control" type="text" name="edit-nama" id="edit-nama">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label class="form-label" for="edit-nama">Deskripsi group</label>
                    <textarea style="resize: none" class="form-text form-control" name="edit-deskripsi" id="edit-deskripsi" cols="12" rows="10"></textarea>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn-submit-edit-group btn btn-primary text-white font-medium waves-effect">
            Save changes
          </button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    </form>
    <!-- /.modal-dialog -->
</div>

<div id="modalBuatGroup" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" style="display: none;" aria-hidden="true">
    <form method="post">
        @csrf
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary d-flex align-items-center">
          <h4 class="modal-title" id="myModalLabel">
            Buat Group
          </h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col-12">
                    <label class="form-label" for="nama">Nama group</label>
                    <input class="form-control" type="text" name="nama" id="nama">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label class="form-label" for="nama">Deskripsi group</label>
                    <textarea style="resize: none" class="form-text form-control" name="deskripsi" id="deskripsi" cols="12" rows="10"></textarea>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn-submit-group btn btn-primary text-white font-medium waves-effect">
            Save changes
          </button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    </form>
    <!-- /.modal-dialog -->
</div>


    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Group</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted "
                                    href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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

    <div class="row">
        <div class="col-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-4 ">
                            <h5 class="card-title fw-semibold">Daftar Group</h5>
                            <p class="card-subtitle mb-0">List group yang kamu buat</p>
                        </div>
                        <div class="col-8 d-flex justify-content-end align-items-center">
                            <button data-bs-toggle="modal" data-bs-target="#modalBuatGroup" class="btn btn-primary">
                                Buat Group
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-group">

    </div>
@endsection

@section('script')
    <script src="{{ asset('dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('dist/js/dashboard3.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Ketika input file berubah
            $('#logo').on('change', function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Mengubah src gambar preview
                    $('#preview-logo').attr('src', e.target.result);
                }

                reader.readAsDataURL(file);
            });

            get();

            function get(){
                axios.get("/data-group")
                .then((res)=>{
                    const group = res.data;

                    if(group.length === 0){
                        $(".row-group").html(`

                        <h1>Belum Memiliki Data</h1>

                        `)
                    }else{
                        $(".row-group").empty();
                        $.each(group,(index,data)=>{

                            const elementGroup = `
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
                                                        ${data.nama}
                                                    </span>
                                                    <h6 class="card-subtitle mt-2 mb-0 fw-normal text-muted">
                                                        By ${data.kreator.nama}
                                                    </h6>
                                                    <div class="d-flex gap-1">
                                                        <button onclick="handleDetailGroup('${data.id}')" data-bs-toggle="modal" data-bs-target="#modalDetailGroup" class="btn p-0">
                                                            <i class="ti ti-eye-check"></i>
                                                        </button>
                                                        <button onclick="handleEditGroup('${data.id}','${data.nama}','${data.deskripsi}')" data-bs-toggle="modal" data-bs-target="#modalEditGroup" class="btn p-0">
                                                            <i class="ti ti-pencil"></i>
                                                        </button>
                                                        <button class="btn p-0">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            `
                            $(".row-group").append(elementGroup)

                        })

                    }

                })
                .catch((err)=>{
                    console.log(err)
                })
            }

            $(".btn-submit-group").click(function(){
                const nama = $("#nama").val()
                const deskripsi = $("#deskripsi").val()

                axios.post("/create-group",{nama,deskripsi})
                .then((res)=>{
                   get()
                   $("#modalBuatGroup").modal('toggle');
                })
                .catch((err)=>{
                    for (let i = 0; i < err.response.data.errors.length; i++) {
                    const element = err.response.data.errors[i];
                    toastr.error(element)
                }
                })

            })

            $(".btn-submit-edit-group").click(function(){
                const nama = $("#edit-nama").val()
                const deskripsi = $("#edit-deskripsi").val()
                const id = $("#modalEditGroup form").attr("data-group_id");
                axios.put("/update-group/"+id,{nama,deskripsi})
                .then((res)=>{
                    get()
                    $("#modalEditGroup").modal('toggle');
                    toastr.success(res.data.message)
                })
                .catch((err)=>{
                    for (let i = 0; i < err.response.data.errors.length; i++) {
                    const element = err.response.data.errors[i];
                    toastr.error(element)
                }
                })

            })

        });


        function handleEditGroup(id,nama,deskripsi)
            {
                $("#modalEditGroup form").attr("data-group_id",id);
                $("#edit-nama").val(nama)
                $("#edit-deskripsi").val(deskripsi)
            }

        function handleDetailGroup(id)
        {
            axios.get("/data-detail-group/"+id)
            .then((res)=>{
                const group = res.data;
                const anggota = res.data.users;
                console.log(anggota);
                $("#nama-group").text(group.nama)
                $("#deskripsi-group").text(group.deskripsi)
                $("#group-code").text(group.code)

                $.each(anggota,(index,user)=>{
                    const row = $("<tr>").addClass(`anggota-`+user.id)
                    .html(`

                    <td>
                        ${index+1}
                    </td>
                    <td>
                        ${user.nama}
                    </td>
                   <td>
                    <button class="btn btn-danger">Kick</button>
                    </td>

                    `);

                    $("#tabel-anggota").append(row);
                })


            })
            .catch((err)=>{

            })
        }



    </script>
@endsection
