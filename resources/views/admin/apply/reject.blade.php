@extends('admin.layouts.app')
@section('title','Halaman Manage Apply (Reject)')
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
              <li class="breadcrumb-item active">Reject</li>
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
          <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tipejob" title="Tambah Data">
              <i class="fa fa-plus"></i>
            </button>
              <table id="data-job" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pelamar</th>
                  <th>Nama Perusahaan</th>
                  <th>Nama Pekerjaan</th>
                  <th>CV</th>
                  <th>Ditolak Tanggal</th>
                </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td width="15">{{ $no++ }}</td>
                        <td>{{ $item->user->first_name.' '.$item->user->last_name }}</td>
                        <td>{{ $item->job->company->nama_perusahaan }}</td>
                        <td>{{ $item->job->nama_pekerjaan }}</td>
                        <td>
                            <a target="_blank" href="{{ url('file/cv/'.$item->user->biodata->cv) }}">CV {{ $item->user->first_name }}</a>
                        </td>
                        <td>{{ date('d F Y / H:i:s', strtotime($item->updated_at)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid --> 
@endsection
  
@push('script')
    <!-- DataTables -->
    <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <script>
    $(function () {
        $("#data-job").DataTable();
    });
    </script>
@endpush