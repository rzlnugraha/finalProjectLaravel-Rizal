@extends('admin.layouts.app')
@section('title','Halaman '.$company->nama_perusahaan)
@push('style')
    
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
              <li class="breadcrumb-item active">{{ $company->nama_perusahaan }}</li>
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
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                {{-- {{ $company->nama_perusahaan }}  --}}
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-7">
                    <h2 class="lead"><b>{{ $company->nama_perusahaan }}</b></h2>
                    <p class="text-muted text-sm"><b>Industri: </b> {{ $company->jenis_industri }} </p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $company->alamat_perusahaan }}</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> About #: {{ $company->deskripsi_perusahaan }}
                      </li>
                    </ul>
                  </div>
                  <div class="col-5 text-center">
                    <img src="{{ asset('images/perusahaan/'.$company->foto_perusahaan) }}" alt="" class="img-circle img-fluid">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  {{-- <a href="#" class="btn btn-sm bg-teal">
                    <i class="fas fa-comments"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-primary">
                    <i class="fas fa-user"></i> View Profile
                  </a> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->    
@endsection
  
@push('script')
    
@endpush