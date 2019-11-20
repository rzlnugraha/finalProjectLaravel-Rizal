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
        <div class="row">
            <form action="{{ route('admin.update',$user->id) }}" method="post">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="" class="control-label">Nama Depan</label>
                    <input type="text" name="first_name" id="" class="form-control" value="{{ $user->first_name }}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Nama Belakang</label>
                    <input type="text" name="last_name" id="" class="form-control" value="{{ $user->last_name }}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Email</label>
                    <input type="email" name="email" id="" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="" class="form-control" value="{{ $user->biodata->tgl_lahir }}">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div><!-- /.container-fluid --> 
@endsection
  
@push('script')
@endpush