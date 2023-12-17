@extends('admin.layout.app')

@section('content')


<div class="modal fade" id="modalDeleteSurveyor" tabindex="-1" aria-labelledby="vertical-center-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content modal-filled bg-light-warning">
        <div class="modal-body p-4">
          <div class="text-center text-warning">
            <i class="ti ti-alert-octagon fs-7"></i>
            <h4 class="mt-2">Peringatan !!</h4>
            <p class="mt-3">
              Kamu akan menghapus data surveyor mulai dari user sampai dengan survey dan penilaianya yang tidak akan bisa dipulihkan. Yakin ?
            </p>
            <button type="button" class="btn btn-light my-2 btn-delete-surveyor" data-bs-dismiss="modal">
              Continue
            </button>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
  </div>

<div id="tambahUser" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" style="display: none;" aria-hidden="true">
    <form method="post" id="formTambahUser" enctype="multipart/form-data">
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
          <button type="button" class="btn-tambah-user btn btn-light-primary text-primary font-medium waves-effect">
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
    <form  method="post" id="formTambahSurveyor" enctype="multipart/form-data">
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
          <button type="button" class="btn-tambah-surveyor btn btn-light-primary text-primary font-medium waves-effect">
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




$('#tabel-persetujuan').DataTable({
    info: false,
    ordering: false,
    paging: false,
    order: [[3, 'desc']]
});

getUser();
getSurveyor();
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

function handlePermission(status,id){
    axios.put("/update-permission",{status,id})
    .then(res=>{
        getSurveyor()
        toastr.success(res.data.message)
    })
    .catch(err=>{
        for (let i = 0; i < err.response.data.errors.length; i++) {
                const element = err.response.data.errors[i];
                toastr.error(element)
        }
    })
}



function getSurveyor(){
    axios.get("/data-surveyor")
    .then((res)=>{
        $("#tabel-surveyor tbody").empty()
      const user = res.data;

      $.each(user,(index,data)=>{
        let button = ""
        console.log(data)
        if(data.permission){
            if(data.id != 1){
                button = `
                <button onclick="handlePermission('${data.permission}','${data.id}')" class="btn btn-danger">
                    Delete Permission
                </button>
                `
            }
        }else{
            button = `
            <button onclick="handlePermission('${data.permission}','${data.id}')" class="btn btn-success">
                Give Permission
            </button>
            `
        }
        let btnDelete = '';
        if(data.id != 1){
            btnDelete = `
            <button onclick="modalDelete('${data.id}')" data-bs-toggle="modal" data-bs-target="#modalDeleteSurveyor" class="border-0 p-0 text-danger bg-transparent ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z"/></svg>
            </button>
            `
        }

            const element = `
            <tr>
                <td>${index+1}</td>
                <td>${data.nama}</td>
                <td>${data.email}</td>
                <td>
                    ${button}
                    ${btnDelete}
                </td>
            </tr>
            `
            $("#tabel-surveyor tbody").append(element);
      })

    })
    .catch((err)=>{
      console.log(err);
    })
}

function modalDelete(id){
    console.log(id);
    $("#modalDeleteSurveyor").attr("data-user_id",id);
}

$(".btn-delete-surveyor").click(function(){
    const id =  $("#modalDeleteSurveyor").attr("data-user_id");
    axios.delete("/delete-surveyor/"+id)
    .then(res=>{
        console.log(res.data)
        getSurveyor()
        toastr.success(res.data.message)
    })
    .catch(err=>{
        console.log(err)
        for (let i = 0; i < err.response.data.errors.length; i++) {
                const element = err.response.data.errors[i];
                toastr.error(element)
        }
    })
})


$(".btn-tambah-surveyor").click(function(){

    const nama = $("#namaSurveyor").val();
    const email = $("#emailSurveyor").val();
    const password = $("#passwordSurveyor").val();

    axios.post("/tambah-surveyor",{nama,email,password})
    .then(res=>{
        getSurveyor();
        $("#tambahSurveyor").modal("toggle");
        $("#formTambahSurveyor").trigger("reset");
        toastr.success(res.data.message)
    })
    .catch(err=>{
        for (let i = 0; i < err.response.data.errors.length; i++) {
                const element = err.response.data.errors[i];
                toastr.error(element)
        }
    })

})

$(".btn-tambah-user").click(function(){

    const nama = $("#nama").val();
    const email = $("#email").val();
    const password = $("#password").val();

    axios.post("/tambah-user",{nama,email,password})
    .then(res=>{
        getUser();
        $("#tambahUser").modal("toggle");
        $("#formTambahUser").trigger("reset");
        toastr.success(res.data.message)
    })
    .catch(err=>{
        for (let i = 0; i < err.response.data.errors.length; i++) {
                const element = err.response.data.errors[i];
                toastr.error(element)
        }
    })

})

$('#tabel-surveyor').DataTable({
    info: false,
    ordering: false,
    paging: false,
    order: [[3, 'desc']]
});


$('#tabel-pengguna').DataTable({
    info: false,
    ordering: false,
    paging: false,
    order: [[3, 'desc']]
});






</script>

@endsection
