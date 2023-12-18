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
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></script>
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

                  <form action="{{ route('user.register') }}" method="POST" id="loginForm">
                    @csrf
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama">
                    </div>

                    @error('nama')
                        <script>
                            toastr.success("tes");
                        </script>
                    @enderror

                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-4 d-flex justify-content-evenly">
                        <label onclick="get()" class="check-label border label-background rounded p-2 border-primary d-flex justify-content-center flex-column align-items-center" for="role">
                            <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M5 18.235q1.35-1.325 3.138-2.088T12 15.385q2.075 0 3.863.762T19 18.235V5H5zm7-5.158q1.258 0 2.129-.871t.871-2.13q0-1.257-.871-2.128T12 7.077q-1.258 0-2.129.871T9 10.077q0 1.258.871 2.129t2.129.87M4 20V4h16v16zm1.885-1h12.23v-.173q-1.319-1.24-2.873-1.841q-1.554-.601-3.242-.601q-1.65 0-3.213.591q-1.564.591-2.902 1.812zM12 12.077q-.817 0-1.409-.591q-.591-.592-.591-1.41q0-.816.591-1.408q.592-.591 1.409-.591q.817 0 1.409.591q.591.592.591 1.409q0 .817-.591 1.409q-.592.59-1.409.59m0-.459"/></svg>
                            <h6 class="text-primary">Pengguna</h4>
                            <input checked class="d-none radio-trigger" type="radio" value="1" name="role_id" id="role">
                            </label>
                        <label onclick="get()" class="check-label border rounded p-2 border-primary d-flex justify-content-center flex-column align-items-center" for="role2">
                            <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M5 18.235q1.35-1.325 3.138-2.088T12 15.385q2.075 0 3.863.762T19 18.235V5H5zm7-5.158q1.258 0 2.129-.871t.871-2.13q0-1.257-.871-2.128T12 7.077q-1.258 0-2.129.871T9 10.077q0 1.258.871 2.129t2.129.87M4 20V4h16v16zm1.885-1h12.23v-.173q-1.319-1.24-2.873-1.841q-1.554-.601-3.242-.601q-1.65 0-3.213.591q-1.564.591-2.902 1.812zM12 12.077q-.817 0-1.409-.591q-.591-.592-.591-1.41q0-.816.591-1.408q.592-.591 1.409-.591q.817 0 1.409.591q.591.592.591 1.409q0 .817-.591 1.409q-.592.59-1.409.59m0-.459"/></svg>
                            <h6 class="text-primary">Surveyor</h6>
                            <input class="d-none radio-trigger" type="radio" value="2" name="role_id" id="role2">
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign Up</button>
                    <span class="text-center mx-auto d-block">Sudah punya akun?  <a href="{{route('page.login')}}">login</a></span>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    @include('components.script')

    <script>
        get()
        function get(){
            const input = $("input[name='role_id']");
             $.each(input,(index,data)=>{
                 if(data.checked){
                     $(`label[for='${data.id}']`).addClass("bg-primary")
                     $(`label[for='${data.id}'] svg`).addClass("text-white")
                     $(`label[for='${data.id}'] h6`).addClass("text-white")
                    }else{
                        $(`label[for='${data.id}']`).removeClass("bg-primary")
                        $(`label[for='${data.id}'] svg`).removeClass("text-white")
                        $(`label[for='${data.id}'] h6`).removeClass("text-white")
                 }
             })
        }
    </script>

  </body>

</html>
