@extends('admin.layout.app')

@section('content')

<div id="tambahUser" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" style="display: none;" aria-hidden="true">
    <form action="{{ route('create.user') }}" method="post" id="formTambahUser" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center bg-primary">
          <h4 class="modal-title" id="myModalLabel">
           Tambah User
          </h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="my-3 d-flex flex-column">
                <label class="form-label " for="foto-profil">
                    <img width="100" height="100" style="object-fit: cover" class="profile-pengguna rounded-circle mx-auto d-block cursor-pointer" src="{{asset('default.jpg')}}" alt="">
                    <p class="text-center">Foto profile</p>
                </label>
                <input class="form-control d-none" type="file" name="fotoProfile" id="foto-profil" placeholder="Adi Kurniawan">
            </div>
            <div class="my-3 d-flex flex-column">
                <label class="form-label" for="nama">Nama</label>
                <input class="form-control" type="text" name="nama" id="nama" placeholder="Adi Kurniawan">
            </div>
            <div class="my-3 d-flex flex-column">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="adi@email.com">
            </div>
            <div class="my-3 d-flex flex-column">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="password123">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-light-primary text-primary font-medium waves-effect" data-bs-dismiss="modal">
            Save changes
          </button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </form>
</div>
<div id="tambahSurveyor" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" style="display: none;" aria-hidden="true">
    <form action="{{ route('create.user') }}" method="post" id="formTambahSurveyor" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center bg-primary">
          <h4 class="modal-title" id="myModalLabel">
           Tambah Surveyor
          </h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="my-3 d-flex flex-column">
                <label class="form-label " for="foto-profil">
                    <img width="100" height="100" style="object-fit: cover" class="profile-surveyor rounded-circle mx-auto d-block cursor-pointer" src="{{asset('default.jpg')}}" alt="">
                    <p class="text-center">Foto profile</p>
                </label>
                <input class="form-control d-none" type="file" name="fotoProfileSurveyor" id="fotoprofilSurveyor" placeholder="Adi Kurniawan">
            </div>
            <div class="my-3 d-flex flex-column">
                <label class="form-label" for="nama">Nama</label>
                <input class="form-control" type="text" name="namaSurveyor" id="namaSurveyor" placeholder="Adi Kurniawan">
            </div>
            <div class="my-3 d-flex flex-column">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="emailSurveyor" id="emailSurveyor" placeholder="adi@email.com">
            </div>
            <div class="my-3 d-flex flex-column">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="passwordSurveyor" id="passwordSurveyor" placeholder="password123">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-light-primary text-primary font-medium waves-effect" data-bs-dismiss="modal">
            Save changes
          </button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </form>
</div>

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Pengguna</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a class="text-muted " href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item" aria-current="page">Pengguna</li>
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
    <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="mb-2">
              <h5 class="mb-0">Tambahkan Pengguna</h5>
            </div>
            <p class="mb-3 card-subtitle">
              Kamu bisa menambahkan pengguna disini
            </p>
            <div>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link d-flex active" data-bs-toggle="tab" href="#home2" role="tab" aria-selected="true">
                    <span><i class="ti ti-home-2 fs-4"></i>
                    </span>
                    <span class="d-none d-md-block ms-2">Pengguna</span>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link d-flex" data-bs-toggle="tab" href="#profile2" role="tab" aria-selected="false" tabindex="-1">
                    <span><i class="ti ti-user fs-4"></i>
                    </span>
                    <span class="d-none d-md-block ms-2">Surveyor</span>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link d-flex" data-bs-toggle="tab" href="#messages2" role="tab" aria-selected="false" tabindex="-1">
                    <span><i class="ri-chat-4-line"></i> </span>
                    <span class="d-none d-md-block ms-2">Persetujuan Surveyor</span>
                  </a>
                </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active show" id="home2" role="tabpanel">
                  <div class="p-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-0 col-md-9"></div>
                                <div class="col-12 col-md-3 d-flex justify-content-end">
                                    <button data-bs-toggle="modal" data-bs-target="#tambahUser" class="btn btn-primary">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <table id="tabel-pengguna" class="table">
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
                  </div>
                </div>
                <div class="tab-pane p-3" id="profile2" role="tabpanel">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-0 col-md-9"></div>
                                <div class="col-12 col-md-3 d-flex justify-content-end">
                                    <button data-bs-toggle="modal" data-bs-target="#tambahSurveyor" class="btn btn-primary">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <table id="tabel-surveyor" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane p-3" id="messages2" role="tabpanel">
                    <div class="row">
                        <div class="col-12">

                            <table id="tabel-persetujuan" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('dist/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script>



$('#tabel-surveyor').DataTable({
    info: false,
    ordering: false,
    paging: false,
    order: [[3, 'desc']]
});

$('#tabel-persetujuan').DataTable({
    info: false,
    ordering: false,
    paging: false,
    order: [[3, 'desc']]
});

getUser();

function getUser(){
    axios.get("/data-user")
    .then((res)=>{
        $("#tabel-pengguna tbody").empty()
      const user = res.data;

      $.each(user,(index,data)=>{
            const element = `
            <tr>
                <td>${index+1}</td>
                <td>${data.nama}</td>
                <td>${data.email}</td>
            </tr>
            `
            $("#tabel-pengguna tbody").append(element);
      })


    })
    .catch((err)=>{
      console.log(err);
    })
}

$('#tabel-pengguna').DataTable({
  info: false,
    ordering: false,
    paging: false,
    order: [[3, 'desc']]
});


function readURL(input,p) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(p)
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function () {
    $("#foto-profil").change(function () {
        readURL(this,'.profile-pengguna');
    });

    $("#fotoProfilSurveyor").change(function () {
        readURL(this,'.profile-surveyor');
    });
});

$("#formTambahUser").submit(function(e){
    e.preventDefault();
    let formData = new FormData(this);

    axios.post(this.action,formData)
    .then((res)=>{
        getUser();
        $(this).trigger("reset");
        toastr.success(res.data.message)
    })
    .catch((err)=>{
        for (let i = 0; i < err.response.data.errors.length; i++) {
                const element = err.response.data.errors[i];
                toastr.error(element)
        }
    })

})




</script>

@endsection
