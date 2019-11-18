@extends('admin.layouts.app')
@section('title','Index')
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
            <div class="col-md-6">
                <form action="{{ route('tipejob.update',$tipejob->id) }}" method="post">
                    @csrf @method('PUT')
                    @include('admin.tipejob._form')
                </form>
            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->    
@endsection
  
@push('script')
    
@endpush