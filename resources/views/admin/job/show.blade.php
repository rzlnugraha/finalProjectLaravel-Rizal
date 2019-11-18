@extends('admin.layouts.app')
@section('title','Halaman '.$job->nama_pekerjaan)
@push('style')
    
@endpush

@section('content-header')
    <div class="content-header">
    </div>
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jenis Pekerjaan : {{ $job->job_types->job_type }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $job->nama_pekerjaan }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->  
      
      <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ $job->nama_pekerjaan }}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Gaji</span>
                      <span class="info-box-number text-center text-muted mb-0">Rp. {{ number_format($job->gaji, 0,',','.') }}</span>
                    </div>
                  </div>
                </div>
                @php
                    $fdate=date('Y-m-d');
                    $tdate=$job->tanggal_expired;

                    $to = \Carbon\Carbon::createFromFormat('Y-m-d', $fdate);
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d', $tdate);
                    $diff_in_days = $to->diffInDays($from);
                @endphp 
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Lowongan Sampai</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ date('d F Y', strtotime($job->tanggal_expired)) }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Sisa Tutup Lowangan</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $diff_in_days != 0 ? $diff_in_days.' Hari' : 'Tutup' }}<span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Recent Activity</h4>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                        </span>
                        <span class="description">Shared publicly - 7:45 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                      </p>
                    </div>

                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>
                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 2</a>
                      </p>
                    </div>

                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                        </span>
                        <span class="description">Shared publicly - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v1</a>
                      </p>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{ $job->nama_pekerjaan }}</h3>
              <br><h5>Deskripsi Pekerjaan</h5>
              <p class="text-muted">{{ $job->deskripsi }}</p>
              <h5>Requirements</h5>
              <p class="text-muted">{{ $job->requirements }}</p>
              <br>
              <img src="{{ $job->foto() }}" style="width:300px; height:200px; margin-bottom:30px" alt="" srcset="">
              <div class="text-muted">
                <p class="text-sm">Nama Perusahaan
                  <b class="d-block">{{ $job->nama_perusahaan }}</b>
                </p>
                <p class="text-sm">Alamat Perusahaan
                  <b class="d-block">{{ $job->alamat_perusahaan }}</b>
                </p>
              </div>

              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalLong">Edit Data</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('jobs.update',$job->id) }}" method="post" enctype="multipart/form-data">
              @csrf @method('put')
              @include('admin.job._form', [
                'button' => 'Update'
              ])
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
  
@push('script')
    
@endpush