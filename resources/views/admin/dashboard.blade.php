@extends('admin.layout.app');
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
              <div class="row align-items-center">
                <div class="col-9">
                  <h4 class="fw-semibold mb-8">Dashboard </h4>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                      {{-- <li class="breadcrumb-item" aria-current="page">Banner</li> --}}
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

        <div class="owl-carousel counter-carousel owl-theme">
            <div class="item">
                <div class="card border-0 zoom-in bg-light-primary shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-user-male.svg"
                                width="50" height="50" class="mb-3" alt="" />
                            <p class="fw-semibold fs-3 text-primary mb-1">Jumlah Survei</p>
                            <h5 class="fw-semibold text-primary mb-0">{{ Auth::user()->surveis->count() }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-light-warning shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-briefcase.svg"
                                width="50" height="50" class="mb-3" alt="" />
                            <p class="fw-semibold fs-3 text-warning mb-1">User menyelesaikan survei Public</p>
                            <h5 class="fw-semibold text-warning mb-0">{{ \App\Models\Pengerjaan::where('group_id', null)->count() }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-light-info shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-mailbox.svg"
                                width="50" height="50" class="mb-3" alt="" />
                            <p class="fw-semibold fs-3 text-info mb-1">User menyelesaikan survei Group</p>
                            <h5 class="fw-semibold text-info mb-0">{{ \App\Models\Pengerjaan::where('group_id', '!=', null)->count()     }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
