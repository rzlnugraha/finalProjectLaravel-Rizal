@extends('admin.layouts.app')
@section('title','Index')
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
              <li class="breadcrumb-item active">Dashboard {{ Sentinel::getUser()->first_name }}</li>
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
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal" title="Tambah Data">
              <i class="fa fa-plus"></i>
            </button>
              <table id="data-job" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Perusahaan</th>
                  <th>Alamat Perusahaan</th>
                  <th>Jenis Industri</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                      $no = 1;
                  @endphp
                @forelse ($company as $item)
                <tr>  
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->nama_perusahaan }}</td>
                    <td>{{ $item->alamat_perusahaan }}</td>
                    <td>{{ $item->jenis_industri }}</td>
                    <td>
                      <ul class="list-inline">
                        <li class="list-inline-item"><a href="{{ route('company.show',$item->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></li>
                        <li class="list-inline-item"><a href="{{ route('company.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a></li>
                        <li class="list-inline-item">
                          <form action="{{ route('company.destroy',$item->id) }}" method="post">
                              @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus data?')"><i class="fa fa-trash"></i></button>
                          </form>
                        </li>

                      </ul>
                    </td>
                </tr>
                @empty
                    
                @endforelse
                </tbody>
              </table>
            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid --> 
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
              <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.company._form', [
                  'company' => new \App\Company,
                  'button' => 'Save'
                ])
              </form>
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
    $(function () {
        $("#data-job").DataTable();
    });
    </script>
@endpush