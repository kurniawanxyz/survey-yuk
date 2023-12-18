@extends('admin.layout.app')
@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">User Profile</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a class="text-muted " href="index-2.html">Dashboard</a></li>
              <li class="breadcrumb-item" aria-current="page">User Profile</li>
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
<div class="card overflow-hidden">
    <div class="card-body p-0">
      <img src="../../dist/images/backgrounds/profilebg.jpg" alt="" class="img-fluid">
      <div class="row align-items-center">
        <div class="col-lg-4 order-lg-1 order-2">
          <div class="d-flex gap-2 align-items-center justify-content-around m-4">
            <div class="text-center">
              <i class="ti ti-file-description fs-6 d-block mb-2"></i>
              <h4 class="mb-0 fw-semibold lh-1">{{Auth::user()->}}</h4>
              <p class="mb-0 fs-4">Survei</p>
            </div>
            <div class="text-center">
              <i class="ti ti-user-circle fs-6 d-block mb-2"></i>
              <h4 class="mb-0 fw-semibold lh-1">3,586</h4>
              <p class="mb-0 fs-4">Survei dikerjakan</p>
            </div>
            <div class="text-center">
              <i class="ti ti-user-check fs-6 d-block mb-2"></i>
              <h4 class="mb-0 fw-semibold lh-1">2,659</h4>
              <p class="mb-0 fs-4">Group</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-n3 order-lg-2 order-1">
          <div class="mt-n5">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle" style="width: 110px; height: 110px;";>
                <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden" style="width: 100px; height: 100px;";>
                  <img style="object-fit: cover" src="{{ Auth::user()->fotoProfil ? asset('storage/' . Auth::user()->fotoProfil) : asset('default.jpg') }}"  alt="" class="w-100 h-100">
                </div>
              </div>
            </div>
            <div class="text-center">
              <h5 class="fs-5 mb-0 fw-semibold text-capitalize">{{Auth::user()->nama}}</h5>
              <p class="mb-0 fs-4 text-capitalize">{{Auth::user()->role->status}}</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 order-last">
        </div>
      </div>
      <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 bg-light-info rounded-2" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">
            <i class="ti ti-user-circle me-2 fs-6"></i>
            <span class="d-none d-md-block">Profile</span>
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-followers-tab" data-bs-toggle="pill" data-bs-target="#pills-followers" type="button" role="tab" aria-controls="pills-followers" aria-selected="false">
            <i class="ti ti-heart me-2 fs-6"></i>
            <span class="d-none d-md-block">Ganti Password</span>
          </button>
        </li>
      </ul>
    </div>
  </div>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
      <div class="row">
        <div class="card-body p-3">
            <h5 class="mb-3">Edit Profile</h5>
            <form action="{{ route('edit.profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
              <div class="row">
                  <label for="foto-profile">Foto-profile</label>
                <div class="col-md-4">
                    <div class="form-control mb-3">
                    <input type="file" name="fotoProfile" class="form-control" id="foto-profile" placeholder="Enter Name here">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nama" id="tb-fname" value="{{Auth::user()->nama}}" placeholder="Enter Name here">
                    <label for="tb-fname">Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="tb-email" value="{{Auth::user()->email}}" placeholder="name@example.com">
                    <label for="tb-email">Email address</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-md-flex align-items-center mt-3">

                    <div class="ms-auto mt-3 mt-md-0">
                      <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                        <div class="d-flex align-items-center">
                          <i class="ti ti-send me-2 fs-4"></i>
                          Submit
                        </div>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
    <div class="tab-pane fade" id="pills-followers" role="tabpanel" aria-labelledby="pills-followers-tab" tabindex="0">
        <div class="card-body">
            <h5 class="mb-3">Ganti Password</h5>
            <form action="{{ route('edit.password') }}" method="POST">
                @csrf
                @method("PUT")
              <div class="row">
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <input type="password" name="passwordLama" class="form-control" id="tb-email" placeholder="name@example.com">
                    <label for="tb-email">Password Lama</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="tb-pwd" placeholder="Password">
                    <label for="tb-pwd">Password</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="password" name="konfirmPassword" class="form-control" id="tb-cpwd" placeholder="Password">
                    <label for="tb-cpwd">Konfirmasi Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-md-flex align-items-center mt-3">
                    <div class="ms-auto mt-3 mt-md-0">
                      <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                        <div class="d-flex align-items-center">
                          <i class="ti ti-send me-2 fs-4"></i>
                          Submit
                        </div>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
    </div>
    <div class="tab-pane fade" id="pills-friends" role="tabpanel" aria-labelledby="pills-friends-tab" tabindex="0">
      <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
        <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Friends <span class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2">20</span></h3>
        <form class="position-relative">
          <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Friends">
          <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
        </form>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-1.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Betty Adams</h5>
              <span class="text-dark fs-2">Medical Secretary</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-2.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Inez Lyons</h5>
              <span class="text-dark fs-2">Medical Technician</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-3.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Lydia Bryan</h5>
              <span class="text-dark fs-2">Preschool Teacher</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-4.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Carolyn Bryant</h5>
              <span class="text-dark fs-2">Legal Secretary</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-5.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Paul Benson</h5>
              <span class="text-dark fs-2">Safety Engineer</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-6.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Robert Francis</h5>
              <span class="text-dark fs-2">Nursing Administrator</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-7.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Billy Rogers</h5>
              <span class="text-dark fs-2">Legal Secretary</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-8.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Rosetta Brewer</h5>
              <span class="text-dark fs-2">Comptroller</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-9.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Patrick Knight</h5>
              <span class="text-dark fs-2">Retail Store Manager</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-10.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Francis Sutton</h5>
              <span class="text-dark fs-2">Astronomer</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-1.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Bernice Henry</h5>
              <span class="text-dark fs-2">Security Consultant</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-2.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Estella Garcia</h5>
              <span class="text-dark fs-2">Lead Software Test Engineer</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-3.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Norman Moran</h5>
              <span class="text-dark fs-2">Engineer Technician</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-4.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Jessie Matthews</h5>
              <span class="text-dark fs-2">Lead Software Engineer</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-5.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Elijah Perez</h5>
              <span class="text-dark fs-2">Special Education Teacher</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-6.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Robert Martin</h5>
              <span class="text-dark fs-2">Transportation Manager</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-7.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Elva Wong</h5>
              <span class="text-dark fs-2">Logistics Manager</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-8.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Edith Taylor</h5>
              <span class="text-dark fs-2">Union Representative</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-9.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Violet Jackson</h5>
              <span class="text-dark fs-2">Agricultural Inspector</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card hover-img">
            <div class="card-body p-4 text-center border-bottom">
              <img src="../../dist/images/profile/user-10.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
              <h5 class="fw-semibold mb-0">Phoebe Owens</h5>
              <span class="text-dark fs-2">Safety Engineer</span>
            </div>
            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
              <li class="position-relative">
                <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                  <i class="ti ti-brand-facebook"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-instagram"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-github"></i>
                </a>
              </li>
              <li class="position-relative">
                <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                  <i class="ti ti-brand-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="pills-gallery" role="tabpanel" aria-labelledby="pills-gallery-tab" tabindex="0">
      <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
        <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Gallery <span class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2">12</span></h3>
        <form class="position-relative">
          <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Friends">
          <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
        </form>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="card hover-img overflow-hidden rounded-2">
            <div class="card-body p-0">
              <img src="../../dist/images/products/s1.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
              <div class="p-4 d-flex align-items-center justify-content-between">
                <div>
                  <h6 class="fw-semibold mb-0 fs-4">Isuava wakceajo fe.jpg</h6>
                  <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                </div>
                <div class="dropdown">
                  <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                  </a>
                  <ul class="dropdown-menu overflow-hidden">
                    <li><a class="dropdown-item" href="javascript:void(0)">Isuava wakceajo fe.jpg</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card hover-img overflow-hidden rounded-2">
            <div class="card-body p-0">
              <img src="../../dist/images/products/s2.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
              <div class="p-4 d-flex align-items-center justify-content-between">
                <div>
                  <h6 class="fw-semibold mb-0 fs-4">Ip docmowe vemremrif.jpg</h6>
                  <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                </div>
                <div class="dropdown">
                  <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                  </a>
                  <ul class="dropdown-menu overflow-hidden">
                    <li><a class="dropdown-item" href="javascript:void(0)">Ip docmowe vemremrif.jpg</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card hover-img overflow-hidden rounded-2">
            <div class="card-body p-0">
              <img src="../../dist/images/products/s3.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
              <div class="p-4 d-flex align-items-center justify-content-between">
                <div>
                  <h6 class="fw-semibold mb-0 fs-4">Duan cosudos utaku.jpg</h6>
                  <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                </div>
                <div class="dropdown">
                  <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                  </a>
                  <ul class="dropdown-menu overflow-hidden">
                    <li><a class="dropdown-item" href="javascript:void(0)">Duan cosudos utaku.jpg</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card hover-img overflow-hidden rounded-2">
            <div class="card-body p-0">
              <img src="../../dist/images/products/s4.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
              <div class="p-4 d-flex align-items-center justify-content-between">
                <div>
                  <h6 class="fw-semibold mb-0 fs-4">Fu netbuv oggu.jpg</h6>
                  <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                </div>
                <div class="dropdown">
                  <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                  </a>
                  <ul class="dropdown-menu overflow-hidden">
                    <li><a class="dropdown-item" href="javascript:void(0)">Fu netbuv oggu.jpg</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card hover-img overflow-hidden rounded-2">
            <div class="card-body p-0">
              <img src="../../dist/images/products/s5.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
              <div class="p-4 d-flex align-items-center justify-content-between">
                <div>
                  <h6 class="fw-semibold mb-0 fs-4">Di sekog do.jpg</h6>
                  <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                </div>
                <div class="dropdown">
                  <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                  </a>
                  <ul class="dropdown-menu overflow-hidden">
                    <li><a class="dropdown-item" href="javascript:void(0)">Di sekog do.jpg</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card hover-img overflow-hidden rounded-2">
            <div class="card-body p-0">
              <img src="../../dist/images/products/s6.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
              <div class="p-4 d-flex align-items-center justify-content-between">
                <div>
                  <h6 class="fw-semibold mb-0 fs-4">Lo jogu camhiisi.jpg</h6>
                  <span class="text-dark fs-2">Thu, Dec 15, 2023</span>
                </div>
                <div class="dropdown">
                  <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                  </a>
                  <ul class="dropdown-menu overflow-hidden">
                    <li><a class="dropdown-item" href="javascript:void(0)">Lo jogu camhiisi.jpg</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card hover-img overflow-hidden rounded-2">
            <div class="card-body p-0">
              <img src="../../dist/images/products/s7.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
              <div class="p-4 d-flex align-items-center justify-content-between">
                <div>
                  <h6 class="fw-semibold mb-0 fs-4">Orewac huosazud robuf.jpg</h6>
                  <span class="text-dark fs-2">Fri, Dec 16, 2023</span>
                </div>
                <div class="dropdown">
                  <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                  </a>
                  <ul class="dropdown-menu overflow-hidden">
                    <li><a class="dropdown-item" href="javascript:void(0)">Orewac huosazud robuf.jpg</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card hover-img overflow-hidden rounded-2">
            <div class="card-body p-0">
              <img src="../../dist/images/products/s8.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
              <div class="p-4 d-flex align-items-center justify-content-between">
                <div>
                  <h6 class="fw-semibold mb-0 fs-4">Nira biolaizo tuzi.jpg</h6>
                  <span class="text-dark fs-2">Sat, Dec 17, 2023</span>
                </div>
                <div class="dropdown">
                  <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                  </a>
                  <ul class="dropdown-menu overflow-hidden">
                    <li><a class="dropdown-item" href="javascript:void(0)">Nira biolaizo tuzi.jpg</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card hover-img overflow-hidden rounded-2">
            <div class="card-body p-0">
              <img src="../../dist/images/products/s9.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
              <div class="p-4 d-flex align-items-center justify-content-between">
                <div>
                  <h6 class="fw-semibold mb-0 fs-4">Peri metu ejvu.jpg</h6>
                  <span class="text-dark fs-2">Sun, Dec 18, 2023</span>
                </div>
                <div class="dropdown">
                  <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                  </a>
                  <ul class="dropdown-menu overflow-hidden">
                    <li><a class="dropdown-item" href="javascript:void(0)">Peri metu ejvu.jpg</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card hover-img overflow-hidden rounded-2">
            <div class="card-body p-0">
              <img src="../../dist/images/products/s10.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
              <div class="p-4 d-flex align-items-center justify-content-between">
                <div>
                  <h6 class="fw-semibold mb-0 fs-4">Vurnohot tajraje isusufuj.jpg</h6>
                  <span class="text-dark fs-2">Mon, Dec 19, 2023</span>
                </div>
                <div class="dropdown">
                  <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                  </a>
                  <ul class="dropdown-menu overflow-hidden">
                    <li><a class="dropdown-item" href="javascript:void(0)">Vurnohot tajraje isusufuj.jpg</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card hover-img overflow-hidden rounded-2">
            <div class="card-body p-0">
              <img src="../../dist/images/products/s11.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
              <div class="p-4 d-flex align-items-center justify-content-between">
                <div>
                  <h6 class="fw-semibold mb-0 fs-4">Juc oz ma.jpg</h6>
                  <span class="text-dark fs-2">Tue, Dec 20, 2023</span>
                </div>
                <div class="dropdown">
                  <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                  </a>
                  <ul class="dropdown-menu overflow-hidden">
                    <li><a class="dropdown-item" href="javascript:void(0)">Juc oz ma.jpg</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card hover-img overflow-hidden rounded-2">
            <div class="card-body p-0">
              <img src="../../dist/images/products/s12.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
              <div class="p-4 d-flex align-items-center justify-content-between">
                <div>
                  <h6 class="fw-semibold mb-0 fs-4">Povipvez marjelliz zuuva.jpg</h6>
                  <span class="text-dark fs-2">Wed, Dec 21, 2023</span>
                </div>
                <div class="dropdown">
                  <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                  </a>
                  <ul class="dropdown-menu overflow-hidden">
                    <li><a class="dropdown-item" href="javascript:void(0)">Povipvez marjelliz zuuva.jpg</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

