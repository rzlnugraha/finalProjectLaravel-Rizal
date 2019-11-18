@extends('admin.layouts.app')
@section('title','Halaman '.$job->nama_pekerjaan)
@push('style')
    
@endpush

@section('content-header')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ $job->nama_pekerjaan }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard {{ $job->nama_pekerjaan }}</li>
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
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->    
@endsection
  
@push('script')
    
@endpush