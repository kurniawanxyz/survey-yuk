@extends('admin.layout.app')

@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Rekap Nilai</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted "
                                    href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Rekap Nilai</li>
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

    <div id="modal-rekap-nilai-grub" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel"
                style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary text-white">
                            <h4 class="modal-title" id="primary-header-modalLabel">
                               List Survei Berdasarkan Grub
                            </h4>
                            <button type="button" class="btn-close"  data-bs-toggle="modal" data-bs-target="#modal-detail-survey" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <table id="tb-survei-user-group" class="table table-active">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama</td>
                                        <td>Email</td>
                                        <td>Nilai</td>
                                        <td>Kriteria</td>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                           </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modal-detail-survey">
                                Close
                            </button>
                            <button type="button" class="btn btn-light-primary text-primary font-medium">
                                Save changes
                            </button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
    <div id="modal-detail-survey" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel"
                style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary text-white">
                            <h4 class="modal-title" id="primary-header-modalLabel">
                               List Survei Berdasarkan Grub
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <table id="tb-grub-survei" class="table table-active">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Survei</td>
                                        <td>Total Dikerjakan</td>
                                        <td>Aksi</td>
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
                            <button type="button" class="btn btn-light-primary text-primary font-medium">
                                Save changes
                            </button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

    <div class="card overflow-hidden">
        <div class="card-body p-0">
            <ul class="nav nav-pills user-profile-tab justify-content-start bg-light-info rounded-2" id="pills-tab"
                role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                        id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                        role="tab" aria-controls="pills-profile" aria-selected="true">
                        <i class="ti ti-user-circle me-2 fs-6"></i>
                        <span class="d-none d-md-block">Grup</span>
                    </button>
                </li>
                {{-- <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                        id="pills-followers-tab" data-bs-toggle="pill" data-bs-target="#pills-followers" type="button"
                        role="tab" aria-controls="pills-followers" aria-selected="false">
                        <i class="ti ti-heart me-2 fs-6"></i>
                        <span class="d-none d-md-block">Public</span>
                    </button>
                </li> --}}
            </ul>
        </div>
    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
            tabindex="0">
            <div class="row">
                <div class="card-body p-3">
                    <h5 class="mb-3">Rekap Nilai Survey Grup</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Grup</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (Auth::user()->groupThatIMake as $i => $item)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>{{ $item->nama }}</td>
                                    <td><button onclick="handleDetailSurvei('{{$item->id}}')" type="button" class="btn btn-primary" data-bs-target="#modal-detail-survey" data-bs-toggle="modal">Detail</button></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada data survey grup</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Modal --}}
            <div id="modal-survey-grup" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel"
                style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary text-white">
                            <h4 class="modal-title" id="primary-header-modalLabel">
                                Rekap Nilai
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="tb-rekap table table-condensed">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama</td>
                                        <td>Email</td>
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
        </div>
    </div>
    
@endsection

@section('script')
<script src="{{asset('utils/handleKategori.js')}}"></script>
    <script>
        function handleDetailSurvei(id){
            axios.get("/detail-data-survei-di-group/"+id)
            .then(res=>{
                const survei = res.data;
                $("#tb-grub-survei tbody").empty()
                $.each(survei,(i,data)=>{

                    const element = `
                    <tr>
                        <td>${i+1}</td>
                        <td>${data.judul}</td>
                        <td>${data.pengerjaan.length}</td>
                        <td>
                            <button onclick="handleDetailDataSurveiUser('${data.id}')" data-bs-toggle="modal" data-bs-target="#modal-rekap-nilai-grub" class="btn btn-warning">Detail</button>
                        </td>
                    </tr>
                    `

                    $("#tb-grub-survei tbody").append(element)
                })
            })
            .catch(err=>{

            })
        }

        function handleDetailDataSurveiUser(id){
            axios.get("/data-survei-user-by-group/"+id)
            .then(res=>{
                const survei = res.data;
                $("#tb-survei-user-group tbody").empty();
                $.each(survei,(index,data)=>{
                    const element=`
                        <tr>
                            <td>${index+1}</td>
                            <td>${data.user.nama}</td>
                            <td>${data.user.email}</td>
                            <td>${data.nilai}</td>
                            <td>${handleKriteria(data.survei.kriteria,data.nilai)}</td>
                        </tr>
                    `
                    $("#tb-survei-user-group tbody").append(element);
                })
            })
            .catch(err=>{

            })
        }
    </script>
@endsection
