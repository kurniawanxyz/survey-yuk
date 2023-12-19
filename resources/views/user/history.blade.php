@extends('user.layouts.app')

@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">History </h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item" aria-current="page">history</li>
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

  <table class="table table-condensed ">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Survei</td>
            <td>Berdasarkan Group/Public</td>
            <td>Tanggal Pengerjaan</td>
            <td>Nilai</td>
            <td>Kriteria</td>
        </tr>
    </thead>
    <tbody>
        @forelse ( $histories as $index => $data )
           <tr>
                <td>{{$index+1}}</td>
                <td>{{$data->survei->judul}}</td>
                <td>{{$data->group->nama ?? 'public'}}</td>
                <td>{{\Carbon\Carbon::parse($data->created_at)->isoFormat('dddd, DD MMMM YYYY')}}</td>
                <td>{{$data->nilai}}</td>
                <td>
                    @php
                        $totalPertanyaan = $data->survei->pertanyaan->count();
                        $nilaiMaximal = ($totalPertanyaan * 4) * 0.75;
                        $nilaiSedang = ($totalPertanyaan * 4) * 0.45;
                    @endphp
                    @if ($data->nilai >= $nilaiMaximal)
                        <span class="badge bg-light-success text-success">Bagus</span>
                    @elseif ($data->nilai > $nilaiSedang)
                        <span class="badge bg-light-warning text-warning">Sedang</span>
                    @else
                        <span class="badge bg-light-danger text-danger">Buruk</span>
                    @endif
                </td>
           </tr>
        @empty

        @endforelse
    </tbody>
</table>
<div>
  {{-- {{ $histories->links() }} --}}
  {{ $histories->links('pagination::bootstrap-5') }}
</div>
@endsection
