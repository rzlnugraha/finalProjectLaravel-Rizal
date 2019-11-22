@extends('admin.layouts.app')
@section('title','Data User')
@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush

@section('content-header')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ Sentinel::getUser()->first_name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Job Yang Dihapus</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection


@section('main-content')
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data User Yang Dihapus</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tableuser" class="table table-bordered table-hover datauser">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pekerjaan</th>
                    <th>Dihapus Tanggal</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse ($data as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->nama_pekerjaan }}</td>
                    <td>{{ date('d F Y', strtotime($item->deleted_at)) }}</td>
                    <td align="center">
                        <form action="{{ route('job_restore',$item->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Aktifkan</button>                            
                        </form>
                    </td>
                </tr>
                @empty
                    
                @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
  
@push('script')
    <!-- DataTables -->
    <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <script>
        $('#tableuser').DataTable({})
    </script>

@endpush