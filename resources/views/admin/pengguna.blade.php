@extends('admin.layout.app')

@section('content')
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
                            <table id="tabel-pengguna" class="table">
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
                <div class="tab-pane p-3" id="profile2" role="tabpanel">
                    <div class="row">
                        <div class="col-12">
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

$('#tabel-pengguna').DataTable({
    info: false,
    ordering: false,
    paging: false,
    order: [[3, 'desc']]
});

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


</script>

@endsection
