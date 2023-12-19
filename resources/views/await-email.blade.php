<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />

<div style="height: 100vh; width: 100vw; display: flex; align-items: center;">
<div class="container d-flex align-items-center" style="flex-direction: column;">
    <div class="d-flex justify-content-center">
        <img src="{{ asset('logo.png') }}" alt="loader" class="" style="width: 200px;" />
    </div>
    <div class="mt-2 text-center">
        <p class="fw-bold fs-6">Kami sudah mengirim email ke <a href="https://mail.google.com/mail/u/0/#inbox{{ $user->email }}">{{ $user->email }}</a></p>
    </div>
    <div class="d-flex justify-content-evenly">
        <a href="" class="btn btn-primary"><i class="ti ti-arrow-back-up-double icon-lg"></i> Kembali Ke Halaman Login</a>
    </div>
</div>
</div>

