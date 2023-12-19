@extends('admin.layout.user')

@section('content')

    <body>
        <!-- Preloader -->
        <div class="preloader">
            <img src="{{ asset('logo.png') }}" alt="loader" class="lds-ripple img-fluid" />
        </div>
        <!--  Body Wrapper -->
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed"
            data-header-position="fixed">
            <div class="position-relative overflow-hidden radial-gradient min-vh-100">
                <div class="position-relative z-index-5">
                    <div class="row">
                        <div class="col-lg-6 col-xl-8 col-xxl-9">
                            <div class="d-none d-lg-flex align-items-center justify-content-center"
                                style="height: calc(100vh - 80px);">
                                <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg"
                                    alt="" class="img-fluid" width="500">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 col-xxl-3">
                            <div class="card mb-0 shadow-none rounded-0 min-vh-100 h-100">
                                <div class="d-flex align-items-center w-100 h-100">
                                    <div class="card-body">
                                        <div class="mb-5">
                                            <h2 class="fw-bolder fs-7 mb-3">Ganti Password Baru !</h2>
                                            <p class="mb-0 ">
                                                Silakan Ubah Password Anda Dengan Mengisi Inputan Di Bawah Ini
                                            </p>
                                        </div>
                                        <form action="{{ route('forgot-password-reset') }}" method="post">
                                            <div class="mb-3">
                                                @csrf
                                                <input type="hidden" class="form-control" name="token" value="{{ $token }}">
                                                <input type="hidden" class="form-control" name="email" value="{{ $email }}">

                                                <label for="password" class="form-label">Password baru Anda</label>
                                                <input type="password" class="form-control" name="password" id="password">
                                                @error('password')
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror

                                                <label for="confirmation_password" class="form-label mt-2">Konformasi Password</label>
                                                <input type="password" class="form-control" name="confirmation_password"
                                                    id="confirmation_password">
                                                @error('confirmation_password')
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100 py-8 mb-3 mt-2">Ganti Password</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </body>
@endsection
