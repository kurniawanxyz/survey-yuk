<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/authentication-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jul 2023 02:01:04 GMT -->
<head>
    <!--  Title -->
    <title>Survey Yuk</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Survey Yuk" />
    <meta name="author" content="" />
    <meta name="keywords" content="Survey Yuk" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.ico') }}" />
    <!-- Core Css -->
    <link  id="themeColors"  rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
  </head>
  <body>
    <!-- Preloader -->
    <div class="preloader">
      <img src="{{ asset('logo.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <div class="position-relative overflow-hidden radial-gradient min-vh-100">
        <div class="position-relative z-index-5">
          <div class="row">
            <div class="col-xl-7 col-xxl-8">
              <div class="d-none d-xl-flex align-items-center justify-content-center mt-5" style="height: calc(100vh - 80px);">
                <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg" alt="" class="img-fluid" width="500">
              </div>
            </div>
            <div class="col-xl-5 col-xxl-4">
              <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                <div class="col-sm-8 col-md-6 col-xl-9">
                    <img class="mx-auto d-block" src="{{ asset('logo.png') }}" width="120" alt="">
                  <h2 class="mb-5 fs-7 fw-bolder text-center">Selamat Datang Di Survey Yuk</h2>

                  <form action="{{ route('user.login') }}" method="POST" id="loginForm">
                    @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
                    </div>
                    <div class="mb-4">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                    <span class="text-center mx-auto d-block">Belum punya akun?  <a href="{{route('page.register')}}">register</a></span>
                  </form>
                  <a href="{{ route('show-form-forgot-password') }}" class="d-flex justify-content-center mt-2"><i class="ti ti-cloud-lock mt-1 me-1"></i> Lupa Password</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    @include('components.script')

    <script>



    </script>

  </body>

</html>
