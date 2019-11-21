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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Perusahaan Yang Dihapus</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tableuser" class="table table-bordered table-hover datauser">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
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
                    <td align="center">
                        <form action="{{ route('company.restore',$item->id) }}" method="post">
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
<!-- Modal -->
<div class="modal fade" id="ajaxModel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="form-user" name="productForm" class="form-horizontal" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="fname" class="col-sm-6 control-label">Nama Depan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="fname" name="first_name" placeholder="Enter First Name" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lname" class="col-sm-6 control-label">Nama Belakang</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="lname" name="last_name" placeholder="Enter Last Name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="tgl_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label id="password" class="col-sm-2 control-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                    </div>
                    
                    <div class="form-group">
                        <label id="password_confirmation" class="col-sm-2 control-label">Password Confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter Password Confirmation">
                    </div>
    
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-primary" id="saveBtn" value="create">Save changes
                    </button>
                    </div>
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
        $('#tableuser').DataTable({})
    </script>

@endpush