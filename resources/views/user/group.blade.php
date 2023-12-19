@extends('user.layouts.app')

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Group </h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item" aria-current="page">Group</li>
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

<div class="card w-100 bg-light-secondary overflow-hidden shadow-none">
    <div class="card-body py-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-sm-6">
          <h5 class="fw-semibold mb-9 fs-5">Group Survei</h5>
          <p class="mb-9">
            Masuklah ke group survei supaya mendapatkan akses ke survei yang tidak semua orang dapatkan
          </p>
         <form action="{{route('proses.joinGroup')}}" method="post" class="">
            @csrf
            <label for="code" class="d-flex flex-column">
                <span class="form-label">Code Group</span>
            </label>
            <div class="d-flex gap-2">
                <input type="text" placeholder="Masukan code group" name="code" id="code" class="form-control">
                <button class="btn btn-secondary">Gabung</button>
            </div>
         </form>
        </div>
        <div class="col-sm-5">
          <div class="position-relative mb-n5 text-center">
            <img src="{{asset('dist/backgrounds/track-bg.png')}}" alt="" class="img-fluid" style="width: 180px; height: 230px;">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="modalDetailGroup" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-colored-header bg-primary text-white">
          <h4  class="modal-title" id="primary-header-modalLabel">

          </h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h5 class="mt-0">Primary Background</h5>
          <p>
            Cras mattis consectetur purus sit amet
            fermentum. Cras justo odio, dapibus ac facilisis
            in, egestas eget quam. Morbi leo risus, porta ac
            consectetur ac, vestibulum at eros.
          </p>
          <p>
            Praesent commodo cursus magna, vel scelerisque
            nisl consectetur et. Vivamus sagittis lacus vel
            augue laoreet rutrum faucibus dolor auctor.
          </p>
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

  <div class="row row-group">
    @forelse ($groups as $group )
    <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="p-4 d-flex align-items-stretch h-100">
                <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center bg-primary rounded  justify-content-center">
                        <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path fill="currentColor" d="M10.27 12h3.46a1.5 1.5 0 0 0 1.48-1.75l-.3-1.79a2.951 2.951 0 0 0-5.82.01l-.3 1.79c-.15.91.55 1.74 1.48 1.74zm-8.61-.89c-.13.26-.18.57-.1.88c.16.69.76 1.03 1.53 1h1.95c.83 0 1.51-.58 1.51-1.29c0-.14-.03-.27-.07-.4c-.01-.03-.01-.05.01-.08c.09-.16.14-.34.14-.53c0-.31-.14-.6-.36-.82c-.03-.03-.03-.06-.02-.1c.07-.2.07-.43.01-.65a1.12 1.12 0 0 0-.99-.74a.09.09 0 0 1-.07-.03C5.03 8.14 4.72 8 4.37 8c-.3 0-.57.1-.75.26c-.03.03-.06.03-.09.02a1.24 1.24 0 0 0-1.7 1.03c0 .02-.01.04-.03.06c-.29.26-.46.65-.41 1.05c.03.22.12.43.25.6c.03.02.03.06.02.09zm14.58 2.54c-1.17-.52-2.61-.9-4.24-.9c-1.63 0-3.07.39-4.24.9A2.988 2.988 0 0 0 6 16.39V17c0 .55.45 1 1 1h10c.55 0 1-.45 1-1v-.61c0-1.18-.68-2.26-1.76-2.74zm-15.02.93A2.01 2.01 0 0 0 0 16.43V17c0 .55.45 1 1 1h3.5v-1.61c0-.83.23-1.61.63-2.29c-.37-.06-.74-.1-1.13-.1c-.99 0-1.93.21-2.78.58zm21.56 0A6.95 6.95 0 0 0 20 14c-.39 0-.76.04-1.13.1c.4.68.63 1.46.63 2.29V18H23c.55 0 1-.45 1-1v-.57c0-.81-.48-1.53-1.22-1.85zM22 11v-.5c0-1.1-.9-2-2-2h-2c-.42 0-.65.48-.39.81l.7.63c-.19.31-.31.67-.31 1.06c0 1.1.9 2 2 2s2-.9 2-2z"/></svg>
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                        <div>
                            <span href="javascript:void(0)" class="text-dark fs-4 link lh-sm">
                                {{$group->nama}}
                            </span>
                            <h6 class="card-subtitle mt-2 mb-0 fw-normal text-muted">
                                By {{$group->kreator->nama}}
                            </h6>
                            <div class="d-flex gap-1 mt-2">
                                <button data-bs-toggle="modal" data-bs-target="#modalDetailGroup" class="btn btn-success w-100 p-0">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty

    @endforelse
  </div>

@endsection
